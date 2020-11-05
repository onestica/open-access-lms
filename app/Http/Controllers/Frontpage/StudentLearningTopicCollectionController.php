<?php

namespace App\Http\Controllers\Frontpage;

use App\LearningTopic;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentLearningTopicCollectionController extends Controller
{
    public function index()
    {
        $topics = Auth::user()->learningTopicCollections()->with('user','subject')->orderBy('grade_level')->get();

        return view('frontpage.learning-topic.collection.index', compact('topics'));
    }

    public function store(Request $request)
    {
        Auth::user()->learningTopicCollections()->syncWithoutDetaching(['learning_topic_id' => $request->topic_id]);

        return response()->json(['success' => true, 'message' => __('messages.topic_added')]);
    }

    public function destroy($topic)
    {
        Auth::user()->learningTopicCollections()->detach($topic);

        return response()->json(['success' => true, 'message' => __('messages.topic_removed')]);
    }
}
