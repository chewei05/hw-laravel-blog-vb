                <?php do { ?>
                <!-- Blog Post -->
                <h2>
                    <a href="javascript:void();"><?php echo $row_rsPost['Title']; ?></a>
                </h2>
                <p class="lead">
                    作者 <a href="javascript:void();"><?php echo $row_rsPost['Realname']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> 發佈於 <?php echo Carbon\Carbon::parse($row_rsPost['PostDatetime'])->format('Y-m-d h:i'); ?></p>
                <hr>
                <div class="well well-lg">
                   <?php echo $row_rsPost['Content']; ?>
                </div>
                <a class="btn btn-primary" href="{{ asset('') }}post/<?php echo $row_rsPost['Index']; ?>">更多內容 <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php } while ($row_rsPost = $rsPost->fetch(PDO::FETCH_ASSOC)); ?>