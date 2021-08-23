<h1>Edit task</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="name">Student Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name" value ="<?php if (isset($student["name"])) echo $student["name"];?>">
    </div>

    <div class="form-group">
        <label for="classname">Class name</label>
        <input type="text" class="form-control" id="classname" placeholder="Enter a age" name="class_name" value ="<?php if (isset($student["class_name"])) echo $student["class_name"];?>">
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" placeholder="Enter a age" name="age" value ="<?php if (isset($student["age"])) echo $student["age"];?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>