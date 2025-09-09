<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CourseQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $students = $course->students()->orderBy('id', 'DESC')->get();
        return view('admin.questions.create', [
            'course' => $course,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answers' => 'required|integer',
        ]);

        DB::beginTransaction(); // jika gagal, rollback

        try {
            $question = $course->question()->create([
                'question' => $request->question,
            ]);

            // set correct answer
            foreach ($request->answers as $index => $answerText) {
                $isCorrect = ($request->correct_answers == $index);
                $question->answer()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard.courses.show', $course->id);
        } catch (\Exception $e) {
            DB::rollBack(); // jika gagal, rollback
            $error = ValidationException::withMessages(['system_error' => ['System Error!' . $e->getMessage()]]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseQuestion $courseQuestion)
    {
        $course = $courseQuestion->course;
        $student = $course->students()->orderBy('id', 'DESC')->get();
        return view('admin.questions.edit', [
            'courseQuestion' => $courseQuestion,
            'course' => $course,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseQuestion $courseQuestion)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answers' => 'required|array',
            'answers.*' => 'required|string',
            'correct_answers' => 'required|integer',
        ]);

        DB::beginTransaction(); // jika gagal, rollback

        try {
            $courseQuestion->update([
                'question' => $request->question,
            ]);

            $courseQuestion->answer()->delete();

            // set correct answer
            foreach ($request->answers as $index => $answerText) {
                $isCorrect = ($request->correct_answers == $index);
                $courseQuestion->answer()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect,
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard.courses.show', $courseQuestion->course_id);
        } catch (\Exception $e) {
            DB::rollBack(); // jika gagal, rollback
            $error = ValidationException::withMessages(['system_error' => ['System Error!' . $e->getMessage()]]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseQuestion $courseQuestion)
    {
         try {
            $courseQuestion->delete();
            return redirect()->route('dashboard.courses.show', $courseQuestion->course_id);
        } catch (\Exception $e) {
            DB::rollBack(); // jika gagal, rollback
            $error = ValidationException::withMessages(['system_error' => ['System Error!' . $e->getMessage()]]);
            throw $error;
        }
    }
}
