<h1>Students</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/mvc-remake/student/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new student</a>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Age</th>
            <th>Class Name</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
            foreach ($students as $student) {
            echo '<tr>';
            echo "<td>" . $student->getId() . "</td>";
            echo "<td>" . $student->getName() . "</td>";
            echo "<td>" . $student->getAge() . "</td>";
            echo "<td>" . $student->getClassName() . "</td>";
            echo "<td class='text-center'>
            <a class='btn btn-info btn-xs' href='/mvc-remake/student/edit/" . $student->getId() . "' >
            <span class='glyphicon glyphicon-edit'></span> Edit</a> 
            <a href='/mvc-remake/student/delete/" . $student->getId() . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a>
            </td>";
            echo "</tr>";
            }
        ?>
    </table>
</div>