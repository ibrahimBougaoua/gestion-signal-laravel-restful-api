<?php

namespace App\Observers;

use App\Comments;
use App\Signalisation;

class CommentsObserver
{
    /**
     * Handle the comments "created" event.
     *
     * @param  \App\Comments  $comments
     * @return void
     */
    public function created(Comments $comments)
    {
        $signalisation = Signalisation::find($comments->signalisation_id);
        $signalisation->update([
            'nbr_comment' => $signalisation->nbr_comment + 1
        ]);
    }

    /**
     * Handle the comments "updated" event.
     *
     * @param  \App\Comments  $comments
     * @return void
     */
    public function updated(Comments $comments)
    {
        //
    }

    /**
     * Handle the comments "deleted" event.
     *
     * @param  \App\Comments  $comments
     * @return void
     */
    public function deleted(Comments $comments)
    {
        $comment = Comments::where('reply_id',$comments->id);
        $nbr_comment = count($comment->get());

        $signalisation = Signalisation::find($comments->signalisation_id);
        $signalisation->update([
            'nbr_comment' => $signalisation->nbr_comment - $nbr_comment - 1
        ]);

        if( $nbr_comment != 0 )
            $comment->delete();
    }

    /**
     * Handle the comments "restored" event.
     *
     * @param  \App\Comments  $comments
     * @return void
     */
    public function restored(Comments $comments)
    {
        //
    }

    /**
     * Handle the comments "force deleted" event.
     *
     * @param  \App\Comments  $comments
     * @return void
     */
    public function forceDeleted(Comments $comments)
    {
        //
    }
}
