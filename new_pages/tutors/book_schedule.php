<h1> Book Schedule </h1>

<div class="dropdown">
    <a class="dropdown-toggle my-toggle-select" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
        <div class="input-append"><input type="text" class="input-large" data-ng-model="date"><span class="add-on"><i
                class="icon-calendar"></i></span>
        </div>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel"><!-- 
        <datetimepicker data-ng-model="date"
                        data-datetimepicker-config="{ dropdownSelector: '.my-toggle-select', minuteStep: 30, minView:'hour' }"></datetimepicker> -->
    	
        <datetimepicker data-ng-model="date"
                        data-datetimepicker-config="{ dropdownSelector: '.my-toggle-select', minView:'day' }"></datetimepicker>
    </ul>
</div>

</br>

Tutor Id: <input type="text" ng-model="tutor.tutor_id"/>

</br>

<a ng-click="addSchedule()" class="btn btn-primary" >Add Schedule</a> 