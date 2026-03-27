<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\NewsTag;

class NewsroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('max_execution_time', -1);
        $this->validate($request, [
            'image'=> 'required',
            'title'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
            'slug'=> 'required|min:3',
            'meta_title'=> 'nullable|string|min:3',
            'meta_description'=> 'nullable|string|min:3',
            'meta_script'=> 'nullable|string|min:3'
        ]);

        $main_image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $main_image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $main_image_name);
        }

        $content = $request->content;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');

           if(strlen($data) > 30){
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);

               $imgeData = base64_decode($data);
               $image_name= "/upload/" . time().$item.'.png';
               $path = public_path() . $image_name;
               file_put_contents($path, $imgeData);
               
               $image->removeAttribute('src');
               $image->setAttribute('src', $image_name);
           }else{
               $image->removeAttribute('src');
               $image->setAttribute('src', $data);
           }
        }
        $content = $dom->saveHTML();

        $news = new News();
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->content = $content;
        $news->image = $main_image_name;
        $news->meta_title = $request->meta_title;
        $news->meta_description = $request->meta_description;
        $news->meta_script = $request->meta_script;
        $news->save();

        $tags = array_values(array_filter($request->tags));
        foreach ($tags as $key => $tag) {
            $newstag = new Newstag();
            $newstag->news_id = $news->id;
            $newstag->tag = $tag;
            $newstag->is_updated = 1;
            $newstag->save();
        }
        return redirect('/admin/newsroom')->with('success', 'Newsroom has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ini_set('max_execution_time', -1);
        $request->validate([
            'title'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
            'slug'=> 'required|min:3',
            'image'=>'nullable|image',
            'hidden_image'=>'nullable|string'
        ]);
        $main_image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $main_image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $main_image_name);
        }

        $content = $request->content;
        $dom = new \DomDocument();
        @$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');

           if(strlen($data) > 30){
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);

               $imgeData = base64_decode($data);
               $image_name= "/upload/" . time().$item.'.png';
               $path = public_path() . $image_name;
               file_put_contents($path, $imgeData);
               
               $image->removeAttribute('src');
               $image->setAttribute('src', $image_name);
           }else{
               $image->removeAttribute('src');
               $image->setAttribute('src', $data);
           }
        }
        $content = $dom->saveHTML();

        $form_data = array(
            'title' => $request->title,
            'content' => $content,
            'slug' => $request->slug,
            'image' => $main_image_name,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_script'=> $request->meta_script
        );
        News::whereId($id)->update($form_data);

        $tags = array_values(array_filter($request->tags));
        NewsTag::where('news_id',$id)->update(['is_updated'=>0]);
        foreach($tags as $tag){
            $newstags = NewsTag::where([['news_id' , $id],['tag' , $tag]])->first();
            if($newstags){
                $newstags->update(['is_updated'=>1]);
            }else{
                $newstags = NewsTag::create([
                    'news_id' => $id,
                    'tag' => $tag,
                    'is_updated' => 1,
                ]);
            }
        }
        NewsTag::where([['news_id',$id],['is_updated',0]])->delete();
        return redirect('/admin/newsroom')->with('success', 'Newsroom has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags = NewsTag::whereNewsId($id)->delete();
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('/admin/newsroom')->with('success', 'Newsroom has been deleted successfully.');
    }
}
