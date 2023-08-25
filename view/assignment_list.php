<?php include('view/header.php'); ?>
<section class="list" id="list">
    <header class="list__row list__header">
        <h1>Assignments</h1>
        <form action="." method="get" id="list__header__select" class="list__header__select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required >
                <option value="0">View All</option>
                <?php foreach($courses as $course) : ?>
                <?php if($course_id == $course['CourseID']) { ?>
                <option value="<?= $course['CourseID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course['CourseID'] ?>">
                    <?php } ?>
                </option>
                <?php endforeach ?>
            </select>
            <button class="add-button bold">Go</button> 
        </form>
    </header>
    <?php if($assignments) { ?>
        <?php foreach($assignments as $assignment) : ?>
        <div class="list__row">
            <div class="list__item">
                <p class="bold"><?= $assignment['courseName'] ?></p>
                <p><?= $assignment['Description'] ?></p>
            </div>
            <div class="list__removeItem">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_assignment">
                    <input type="hidden" name="assignment_id" name="action" value="<?= $assignment['ID'] ?>">
                    <button class="remove-button">Remove</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    <?php } else { ?>
        <br>
        <?php if($course_id) { ?>
            <p>No assignment exist for this course yet.</p>
        <?php } else { ?>
            <p>No assignment exist yet.</p>
        <?php  } ?>
    <?php  } ?>
</section>

<section id="class" class="add">
    <h2>Add assignment</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label for="">Course: </label>
            <select name="course_id" required>
                <option value="">Please select</option>
                <?php foreach($courses as $course) : ?>
                <option value="<?= $course['CourseID'] ?>">
                    <?= $course['courseName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label for="">Description: </label>
            <input type="text" name="description" maxlength="140" placeholder="description" required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href="?action=list_courses">View/edit courses</a></p>
<?php include('view/footer.php'); ?>


