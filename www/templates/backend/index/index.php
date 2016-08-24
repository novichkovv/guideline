<div style="height: 100px;">

</div>
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-sm-offset-0">
        <div class="row" id="main-content">
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control side-select" id="category_select">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id'] ?>">
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <img class="select-caret" src="<?php echo SITE_DIR; ?>images/caret.png">
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <select class="form-control side-select" id="guideline_select" disabled>
                        <option value="">Select Guideline</option>
                        <!--                --><?php //foreach ($categories as $category): ?>
                        <!--                    <option value="--><?php //echo $category['id'] ?><!--">-->
                        <!--                        --><?php //echo $category['category_name']; ?>
                        <!--                    </option>-->
                        <!--                --><?php //endforeach; ?>
                    </select>
                    <img class="select-caret" src="<?php echo SITE_DIR; ?>images/caret-dis.png">
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <select class="form-control side-select" id="chapter_select" disabled>
                        <option value="">Select Chapter</option>
                        <!--                --><?php //foreach ($categories as $category): ?>
                        <!--                    <option value="--><?php //echo $category['id'] ?><!--">-->
                        <!--                        --><?php //echo $category['category_name']; ?>
                        <!--                    </option>-->
                        <!--                --><?php //endforeach; ?>
                    </select>
                    <img class="select-caret" src="<?php echo SITE_DIR; ?>images/caret-dis.png">
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <select class="form-control side-select" id="topic_select" disabled>
                        <option value="">Select Topic</option>
                        <!--                --><?php //foreach ($categories as $category): ?>
                        <!--                    <option value="--><?php //echo $category['id'] ?><!--">-->
                        <!--                        --><?php //echo $category['category_name']; ?>
                        <!--                    </option>-->
                        <!--                --><?php //endforeach; ?>
                    </select>
                    <img class="select-caret" src="<?php echo SITE_DIR; ?>images/caret-dis.png">
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="result_container">
                <!--        --><?php //require_once TEMPLATE_DIR . 'index' . DS . 'ajax' . DS . 'result.php'; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $ = jQuery.noConflict();
    $(document).ready(function () {
        $("body").on("change", "#category_select", function () {
            var id = $(this).val();
            var $select = $("#guideline_select");
            $select.html('<option value="">Select Guideline</option>');
            var $topic = $("#topic_select");
            var $chapter = $("#chapter_select");
            var $caret = $select.closest('.form-group').find('.select-caret');
            if(!id) {
                $select.prop('disabled', true);
                $caret.attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                $chapter.html('<option value="">Select Chapter</option>');
                $chapter.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                $chapter.prop('disabled', true);
                $topic.html('<option value="">Select topic</option>');
                $topic.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                $topic.prop('disabled', true);

                $("#result_container").html('');
            } else {
                $("#result_container").html('');
                var params = {
                    'action': 'get_guidelines',
                    'values': {'id': id},
                    'callback': function (msg) {
                        ajax_respond(msg,
                            function (respond) { //success
                                if(respond.result) {
                                    for(var i in respond.result) {
                                        $select.append('<option value="' + respond.result[i].id + '">' + respond.result[i].guideline_name + '</option>')
                                    }
                                    $select.prop('disabled', false);
                                    $caret.attr('src', '<?php echo SITE_DIR; ?>images/caret.png');


                                    $chapter.html('<option value="">Select Chapter</option>');
                                    $chapter.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                                    $chapter.prop('disabled', true);
                                    $topic.html('<option value="">Select topic</option>');
                                    $topic.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                                    $topic.prop('disabled', true);
                                }
                            },
                            function (respond) { //fail
                            }
                        );
                    }
                };
                ajax(params);
            }


        });

        $("body").on("change", "#guideline_select", function () {
            var id = $(this).val();
            var $select = $("#chapter_select");
            $select.html('<option value="">Select Chapter</option>');
            var $caret = $select.closest('.form-group').find('.select-caret');
            var $topic = $("#topic_select");
            if(!id) {
                $select.prop('disabled', true);
                $caret.attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                $topic.html('<option value="">Select topic</option>');
                $topic.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                $topic.prop('disabled', true);
                $("#result_container").html('');
            } else {
                $("#result_container").html('');
                var params = {
                    'action': 'get_chapters',
                    'values': {'id': id},
                    'callback': function (msg) {
                        ajax_respond(msg,
                            function (respond) { //success
                                if (respond.result) {

                                    for (var i in respond.result) {
                                        $select.append('<option value="' + respond.result[i].id + '">' + respond.result[i].chapter_name + '</option>')
                                    }
                                    $select.prop('disabled', false);
                                    $caret.attr('src', '<?php echo SITE_DIR; ?>images/caret.png');
                                    $topic.html('<option value="">Select topic</option>');
                                    $topic.closest('.form-group').find('.select-caret').attr('src', '<?php echo SITE_DIR; ?>images/caret-dis.png');
                                    $topic.prop('disabled', true);
                                }
                            },
                            function (respond) { //fail
                            }
                        );
                    }
                };
                ajax(params);
            }
        });

        $("body").on("change", "#chapter_select", function () {
            var id = $(this).val();
            var $select = $("#topic_select");
            $select.html('<option value="">Select Topic</option>');
            var $caret = $select.closest('.form-group').find('.select-caret');
            $("#result_container").html('');
            var params = {
                'action': 'get_topics',
                'values': {'id': id},
                'callback': function (msg) {
                    ajax_respond(msg,
                        function (respond) { //success
                            if(respond.result) {

                                for(var i in respond.result) {
                                    $select.append('<option value="' + respond.result[i].id + '">' + respond.result[i].topic_name + '</option>')
                                }
                                $select.prop('disabled', false);
                                $caret.attr('src', '<?php echo SITE_DIR; ?>images/caret.png');
                            }
                        },
                        function (respond) { //fail
                        }
                    );
                }
            };
            ajax(params);
        });

        $("body").on("change", "#topic_select", function () {
            var id = $(this).val();
            var params = {
                'action': 'get_result',
                'values': {id: id},
                'callback': function (msg) {
                    ajax_respond(msg,
                        function (respond) { //success
                            $("#result_container").html(respond.template);
                        },
                        function (respond) { //fail
                        }
                    );
                }
            };
            ajax(params);
        });

//        $('#category_select').bootstrapSelectToButton({
//            iconTemplate: '<span class="caret"></span>'
//        });
    });
</script>
<style>
    body {
        background: url('/images/page-bg.png') repeat;
    }
    #main-content {
        background-color: #fff;
        padding: 35px 30px;
    }
    .side-select {
        background-color: #26375c;
        height: 45px;
        color: #fff;
        box-shadow: none;
        border-radius: 0;
        width: 90%;
        float: left;
        border: none;
        margin-bottom: 15px;
    }
    .select-caret {
        margin-top: 11px;
    }
    .side-select[disabled] {
        background-color: #677ead;
        color: #ccc;
    }
    .nav-pills>li {
        width: 33%;

    }
    .nav-pills>li>a {
        background-color: #eee;
        border-radius: 0;
        margin-left: 2%;
        margin-right: 2%;
        color: #27375d;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:active, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        background-color: #fe9c2f;
    }
    h4 {
        color: #27375d;
    }
    .rec {
        width: 100%;
        margin-bottom: 10px;
    }
    .rec-level {
        width: 30%;
        background-color: grey;
        color: #fff;
    }
    .rec-sublevel {
        background-color: #ccc;
    }
    .rec-description {
        background-color: #eee;
    }
    .rec td {
        padding: 10px;
    }
    .tab-pane {
        padding: 20px;
    }
    .custom-select .btn-group {
        width: 100%;
    }
    .custom-select button {
        width: 100%;
        text-align: left;
        border-radius: 0;
        color: #fff;
        background-color: #26375c;;
        height: 43px;
    }
    .custom-select button[disabled] {
        background-color: #677ead;
        color: #ccc;
    }
    .custom-select .caret {
        float: right;
        margin-top: 8px;
    }
</style>