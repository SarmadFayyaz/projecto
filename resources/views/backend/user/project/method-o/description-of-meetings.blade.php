<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        Description of Meetings </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar"
     style="background-image: url('{{asset(url('assets/img/meeting-modal.jpg'))}}'); background-repeat: no-repeat; background-attachment: fixed; background-position: right; background-size: 520px 500px; max-height: 75vh;">
    <div class="pl-3 pr-3 pt-2 pb-2">
        <ul class="nav nav-pills nav-pills-{{ $theme }} mb-3 p-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#daily_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    DAILY MEETING
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#retrospective_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    RETROSPECTIVE MEETING
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#follow_up_meeting" role="tablist" style="font-size: 15px !important; padding: 10px 20px !important;">
                    FOLLOW-UP MEETING
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space" style="min-height: 50vh;">
            <div class="tab-pane active show" id="daily_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-8 mt-4 mb-4 p-5" style="border: 2px dashed; border-radius: 40px;">
                                <p>
                                    Round of conversation where each answer these 3 questions: </p>
                                <ul class="mb-3">
                                    <li>How am I progressing with my tasks?</li>
                                    <li>What obstacles do I have to move forward and what are interfering with achieving our goal?</li>
                                    <li>What do I need help with?</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0">15 minutes</h3>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="retrospective_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-4" style="border: 2px dashed; border-radius: 40px;">
                                <p>
                                    After this time of work, we are going to take a break to look at our internal dynamics as a team. </p>
                                <h4 class="mb-0 font-weight-bold">
                                    What would they say about…? </h4>
                                <ul class="mb-3">
                                    <li>What has gone well? (hits)</li>
                                    <li>What has not gone well? (difficulties)</li>
                                    <li>How are we following the rules or regulations that we agree on?</li>
                                    <li>What do we do well and what is important to maintain?</li>
                                    <li>What are the problems that could impede progress?</li>
                                    <li>What have we learned?</li>
                                    <li>What do we need to improve?</li>
                                    <li>What new actions could we try?</li>
                                    <li>What improvements are we going to implement to keep moving forward?</li>
                                    <li>What do I commit to for the progress of the team and the project?</li>
                                    <li>What new habits could we implement?</li>
                                </ul>

                                <h4 class="mb-0 font-weight-bold">
                                    Agreements / commitments </h4>
                                <p class="mb-3">To improve the aspects that we discuss that allow us to make improvements in our dynamics:</p>
                                <p><br>What agreements can we make?<br>What does each one commit to fulfill them?<br>How are we going to take care of the fulfillment of our agreements?</p>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0">60 minutes</h3>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="follow_up_meeting">
                <div class="row">
                    <div class="col-8">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4 mb-4 p-4" style="border: 2px dashed; border-radius: 40px;">
                                <h4 class="mb-0 font-weight-bold">
                                    Follow-up meeting and to review the progress of the project in 2 dimensions:</h4>
                                <ol class="mb-3">
                                    <li>TASKS: What are we doing?</li>
                                    <li>DYNAMIC: How are we doing it?</li>
                                </ol>
                                <h4 class="font-weight-bold">
                                    Context of the meeting - 5 minutes </h4>
                                <h4 class="mb-0 font-weight-bold">Conversation about the general development of the project (task) - 20 minutes:</h4>
                                <p>Share screen by projecting the monitoring board. <br>Conversation where each team member presents the status of their tasks and what their next commitments are.<br>The other members of the team listen and
                                    take note of the contributions, ideas, questions and offers that can enrich the team's work.</p>

                                <h4 class="mb-0 font-weight-bold">Conversation on team dynamics (dynamics) - 20 minutes:</h4>
                                <p>
                                    <span class="font-italic">
                                        In the start-up session we define norms and rules for teamwork. Project them with a shared screen and talk in light of these questions:
                                    </span>
                                    <br> How have we been complying with the norms / rules that we agreed on? In what behaviors have these been complied with or not? Is it necessary to adjust them?<br>What have been the difficulties we have
                                    faced? They share both limitations among themselves and with other teams in the organization. <br>How could you help the team? Possible needs and contributions of each one for the collective work.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="meeting_time">
                        <i class="fas fa-history fa-4x"></i>
                        <h3 class="m-0">45 minutes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
