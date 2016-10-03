<h1> list of students </h1>

<br/>

<ul ng-repeat="student in studentlist">
	<li>{{ student.student_id }} {{ student.username }}</li>
</ul>