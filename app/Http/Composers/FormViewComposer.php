<?php

namespace App\Http\Composers;

use App\Models\Exam;
use App\Models\Board;
use App\Models\University;
use App\Library\BdGeo;
use Illuminate\View\View;

class FormViewComposer
{
    /**
     * Compose view for applicant form.
     *
     * @param \Illuminate\View\View $view
     *
     * @return void
     */
    public function applicantForm(View $view)
    {
        $data = BdGeo::getGeoList();
        $data['exams_list'] = Exam::select('name', 'id', 'level')->get();
        $data['boards_list'] = Board::pluck('name', 'id')->prepend('Select Board', '');
        $data['universities_list'] = University::pluck('name', 'id')->prepend('Select University', '');

        $view->with(compact('data'));
    }
}
