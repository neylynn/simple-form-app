<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = [
            ['id' => 1, 'name' => 'Apple'],
            ['id' => 2, 'name' => 'Banana'],
            ['id' => 3, 'name' => 'Cherry'],
        ];
        $deletedIds = $request->session()->get('deleted_items', []); // Get deleted item IDs from the session
        $activeItems = array_filter($items, fn($item) => !in_array($item['id'], $deletedIds));
        $deletedItems = array_filter($items, fn($item) => in_array($item['id'], $deletedIds));

        $search = $request->input('search');
        // Filter items based on the search query
        if ($search) {
            $activeItems = array_filter($activeItems, fn($item) => stripos($item['name'], $search) !== false);
            $deletedItems = array_filter($deletedItems, fn($item) => stripos($item['name'], $search) !== false);
        }
        return view('items', [
            'activeItems' => $activeItems,
            'deletedItems' => $deletedItems,
            'search' => $search,
        ]);
    }

    public function delete(Request $request, $id)
    {
        $deletedItems = $request->session()->get('deleted_items', []);
        $deletedItems[] = $id;
        $request->session()->put('deleted_items', $deletedItems);
        return response()->json(['success' => true]);
    }

    public function recover(Request $request, $id)
    {
        $deletedItems = $request->session()->get('deleted_items', []);
        $deletedItems = array_diff($deletedItems, [$id]);
        $request->session()->put('deleted_items', $deletedItems);
        return response()->json(['success' => true]);
    }
}
