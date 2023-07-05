<?php

namespace App\Admin\Forms\Step;

use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class StepGradeForm extends StepForm{
    public $title = '评分';
    public function handle(Request $request){
        return $this->next($request->all());
    }
    public function form()
    {
        $this->text('username');
        $this->email('email');
    }

}
