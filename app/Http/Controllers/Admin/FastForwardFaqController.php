<?php

namespace App\Http\Controllers\Admin;

use App\FastForwardFaq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FastForwardFaqController extends Controller
{
    public function index()
    {
        $fastForwardFaqs = FastForwardFaq::orderBy('id')->get();

        return view('admin.fastForwardFaq.index', compact('fastForwardFaqs'));
    }

    public function create()
    {
        return view('admin.fastForwardFaq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
        ]);

        FastForwardFaq::create($validated);

        return redirect()->route('admin.fastForwardFaq.index')
            ->with('success', 'Fast Forward FAQ has been added.');
    }

    public function edit($id)
    {
        $fastForwardFaq = FastForwardFaq::findOrFail($id);

        return view('admin.fastForwardFaq.edit', compact('fastForwardFaq'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'heading' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
        ]);

        $fastForwardFaq = FastForwardFaq::findOrFail($id);
        $fastForwardFaq->update($validated);

        return redirect()->route('admin.fastForwardFaq.index')
            ->with('success', 'Fast Forward FAQ has been updated.');
    }

    public function destroy($id)
    {
        $fastForwardFaq = FastForwardFaq::findOrFail($id);
        $fastForwardFaq->delete();

        return redirect()->route('admin.fastForwardFaq.index')
            ->with('success', 'Fast Forward FAQ has been deleted successfully.');
    }
}
