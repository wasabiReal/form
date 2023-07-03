<div class="container">
    <div class="members-container">
        <a href="/" class ="btn btn-light">Back to registration</a>
        <h2 class="border-bottom">All members</h2>
        <table class="table table-hover">
            <tr>
                <th>№</th>
                <th>Image</th>
                <th>Full Name</th>
                <th>Report subject</th>
                <th>Email</th>
            </tr>
            <?php if (!empty($members)): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <?php $i++; ?>
                        <th><?php echo "<span id='id'>" . $i . "</span>" ?></th>
                        <th>
                            <?php echo "<img src='public/assets/images/" . $member['image'] . "' class = 'member-image'/>"; ?>
                        </th>
                        <th>
                            <?php echo "<span id='fullname'>" . $member['first_name'] . ' ' . $member['last_name'] . "</span>" ?>
                        </th>
                        <th>
                            <?php echo "<span id='report'>" . $member['report'] . "</span>" ?>
                        </th>
                        <th>
                            <?php echo "<span id='email'>" . $member['email'] . "</span>" ?>
                        </th>
                    </tr>
                    <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>


