<?php

namespace App\Policies;

use App\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;
    
    // public function opt_for_course(User $user, Course $course){
    //     return ! $user->teacher || $user->teacher->id || $course->teacher_id;
    // }

    // public function subscribe(User $user){
    //     return $user->role_id !== Role::ADMIN && ! $user->subscribed('main');
    // }

    public function apply(User $user, Job $job){
        //Comprobacion para saber si en un curso se ha inscrito anteriormente un alumno
        return $user->candidate && ! $job->candidates()->contains($user->candidate->id);
    }

    // public function review(User $user, Course $course){
    //     //Comprobacion para saber si en un curso se ha inscrito anteriormente un alumno
    //     return ! $course->reviews->contains('user_id', $user->id);
    // }
}
