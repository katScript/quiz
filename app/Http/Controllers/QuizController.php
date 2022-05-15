<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuizController extends Controller
{

    public function show(Request $request)
    {
        $cat = $request->get('cat');
        $type = $request->get('type');
        $diff = $request->get('diff');

        if (!empty($cat) || !empty($type) || !empty($diff)) {
            $con = [];
            if (!empty($cat)) {
                $con[] = ['category', '=', $cat];
            }

            if (!empty($type)) {
                $con[] = ['type', '=', $type];
            }

            if (!empty($diff)) {
                $con[] = ['difficulty', '=', $diff];
            }

            $quiz = Quiz::where($con);
        } else {
            $quiz = Quiz::all();
        }


        return view('quiz.show', [
            'data' => $quiz
        ]);

    }

    public function create()
    {
        return view('quiz.view');
    }

    public function edit($id)
    {
        $quiz = Quiz::where('id', $id)->first();

        $result = json_decode($quiz->result);

        return view('quiz.view', [
                'data' => $quiz,
                'result' => $result
            ]);
    }

    public function delete($id) {
        try {
            $quiz = Quiz::where('id', $id)->first();

            $quiz->delete();

            return redirect('home');
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }

    public function save(Request $request) {
        $tf = $request->get('tf');
        $ans = $request->get('ans');

        if (!empty($tf) && !empty($ans)) {
            return Redirect::back()->withErrors(['msg' => 'quiz only is True/False or multiple choice']);
        }

        $type = 'tf';
        $result = $request->get('tf');

        if (!empty($ans)) {
            $type = 'mc';

            $result = json_encode([
                'a' => $request->get('a'),
                'b' => $request->get('b'),
                'c' => $request->get('c'),
                'd' => $request->get('d'),
                'ans' => $request->get('ans')
            ]);
        }

        $title = $request->get('title');
        $diff = $request->get('diff');
        $cat = $request->get('category');

        try {
            if ($request->get('id')) {
                $quiz = Quiz::where('id', $request->get('id'))->first();
            } else {
                $quiz = new Quiz();
            }

            $quiz->title = $title;
            $quiz->difficulty = $diff;
            $quiz->category = $cat;
            $quiz->type = $type;
            $quiz->result = $result;

            $quiz->save();

            return redirect('home');
        } catch (\Exception $exception) {
            return Redirect::back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }
}
