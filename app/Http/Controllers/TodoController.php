<?php
namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;




class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
       $this->task = new Todo();
    }
    public function index ()
    {
        $tasks = $this->task->all();
        return view('pages.todo.index')->with(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $this->task->create($request->all());
        return redirect()->back();
    }

    public function delete ($task_id)
    {
        $task =$this->task->find ($task_id);
        $task->delete();
        return redirect()->back();
    }

}
