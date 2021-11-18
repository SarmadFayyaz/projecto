<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="width: 90%; left: 5%;">
        <div class="col-12">
            <div class="row">
                <div class="col-10">
                    <h4 class="modal-title font-weight-bold">
                        Initial Meeting </h4>
                </div>
                <div class="col-2  text-right">
                    <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal-body overflow-auto scroll-bar" style="max-height: 75vh;">
    <div class="text-white rounded bg-{{ $theme }} pl-5 pr-5 pt-3 pb-3 w-75">
        <h4 class="mb-0 font-weight-bold">PURPOSE</h4>
        <p class=""> Formalize the work to be carried out with the team, understand its value for the organization and the business, clarify doubts regarding the project and present the work methodology: METODO Ö. </p>
        <h4 class="mb-0 font-weight-bold">THOSE WHO PARTICIPATE?</h4>
        <p class="mb-0"> Project Manager and assigned team. </p>
    </div>

    <div class="pl-3 pr-3 pt-2 pb-2 mt-3">
        <h4 class="mb-0 font-weight-bold text-center">SESSION DESIGN</h4>
        <ul class="mb-3">
            <li>Session led by the Project Manager.</li>
            <li>Duration: 60 minutes.</li>
            <li>Work session where the project is exposed, a collaborative instance to gather perspective in a way that enriches the vision of the project and clarifies doubts.</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">CONTEXT (5 minutes)</h4>
        <p>The Project Manager thanks the team for joining the project, announces the work to be done considering the relevant and critical issues raised in the meeting with the Sponsor. He explains the current situation and the expected
            result in a way that sets out the project to be developed.</p>

        <h4 class="mb-0 font-weight-bold">Meeting agenda:</h4>
        <ol class="mb-3">
            <li>What is the challenge we have?</li>
            <li>Presentation of the project</li>
            <li>Presentation of method ö</li>
            <li>Task assignment</li>
            <li>Definition of meetings</li>
            <li>Definition of working standards</li>
        </ol>

        <h4 class="mb-0 font-weight-bold">1. &ensp; WHAT IS THE CHALLENGE WE HAVE? CURRENT SITUATION AND DESIRED SITUATION</h4>
        <ul class="mb-3">
            <li>Expose to the team the problem that you want to solve, why is this a problem?</li>
            <li>How is it impacting the business and the organization?</li>
            <li>Story considering the relevant reflections of the meeting with Sponsor.</li>
            <li>Then ask the team to give their vision and complete the diagnosis.</li>
            <li>Take note of the team's input to incorporate into the analysis.</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">2. &ensp; PROJECT PRESENTATION
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}" class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                Project Information
            </a>
        </h4>
        <ul class="mb-3">
            <li>The Método Ö project form should be reviewed.</li>
            <li>Round of questions to the team for their vision, ideas, or aspects that in their opinion it is necessary to incorporate for the success of the project.</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">3. &ensp; MÉTODO Ö PRESENTATION
            <a href="javascript:void(0)" data-url="{{ route('project.show', $project_id) }}" class="project_details btn btn-{{ $theme }} pull-right p-2" style="width: 180px">
                Video MÖ
            </a>
        </h4>
        <ul class="mb-3">
            <li>Present the Método Ö for the development of projects. VIDEO.</li>
            <li>Clarify questions about the methodology.</li>
            <li>Review with the team the critical and key tasks of the project.</li>
        </ul>

        <h4 class="mb-0 font-weight-bold">4. &ensp; TASK ASSIGNMENT
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal" data-modal-id="#addNewTaskModal" style="width: 180px">
                <i class="fa fa-plus mr-2" style="font-size:12px !important"></i> {{ __('header.add_new_task') }}
            </a>
        </h4>
        <ul class="mb-3">
            <li> Based on the purpose of the project, the main milestones of the project should be defined. </li>
            <li> Then the tasks required to achieve those milestones. </li>
            <li> Round with the members so that each one defines their initial tasks. </li>
            <li> Assign responsible to each task and cross users. </li>
            <li> Each member completes on the board the task to which they undertake together with the actions associated with each of them. </li>
            <li> The entire team reviews all assigned tasks and verifies that no action is missing. </li>
            <li> Between all it is completed on the board. </li>
        </ul>
        <h4 class="mb-0 font-weight-bold">5. &ensp;  DEFINITION OF MEETINGS
            <a href="javascript:void(0)" class="btn btn-{{ $theme }} pull-right p-2 open_modal" data-modal-id="#createEventModal" style="width: 180px">
                NEW MEETING
            </a>
        </h4>
        <p class="mb-0"> Review of the different types of meetings:</p>
        <ul class="">
            <li>Daily meeting</li>
            <li>Follow-up meeting</li>
            <li>Retrospective meeting</li>
        </ul>
        <h4 class="mb-0 font-weight-bold text-center">Agree and schedule meetings for the next 4 weeks.
        </h4>
        <h4 class="font-weight-bold text-center">Agree and schedule a weekly closing report date by employee. </h4>

        <h4 class="mb-0 font-weight-bold">6. &ensp;  DEFINITION OF INTERNAL RELATIONSHIP RULES
        </h4>
        <p>"this information is pending"<br>
            It will be a selectable list of different options for the team to choose from. only the boss can select. <br>

            This list can be viewed "Metodo Ö Menu" / "Work Rules"
        </p>
        <input type="checkbox" id="checkbox1" name="checkbox1" value="Lorem">
        <label for="checkbox1"> Lorem Ipsum dolar sit amet.</label> <br>
        <input type="checkbox" id="checkbox2" name="checkbox2" value="Lorem">
        <label for="checkbox2"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox3" name="checkbox3" value="Lorem">
        <label for="checkbox3"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox4" name="checkbox4" value="Lorem">
        <label for="checkbox4"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox5" name="checkbox5" value="Lorem">
        <label for="checkbox5"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox6" name="checkbox6" value="Lorem">
        <label for="checkbox6"> Lorem Ipsum dolar sit amet.</label><br>
        <input type="checkbox" id="checkbox7" name="checkbox7" value="Lorem">
        <label for="checkbox7"> Lorem Ipsum dolar sit amet.</label>
    </div>
</div>
