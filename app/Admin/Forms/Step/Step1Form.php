<?php

namespace App\Admin\Forms\Step;

use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class Step1Form extends StepForm{
    public $title = '填写基本信息';
    public function handle(Request $request){
        return $this->next($request->all());
    }
    public function form(){
        $this->text('username');
        $this->email('email');
    }
}
