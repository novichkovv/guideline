<div class="col-md-8">
    <ul class="nav nav-pills">
        <li class="active"><a href="#1" data-toggle="tab">Topic</a></li>
        <li><a href="#2" data-toggle="tab">Recommendation</a></li>
        <li><a href="#3" data-toggle="tab">Consideration</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="1">
            <div class="row">
                <div class="col-md-12">
                    <h4><?php echo $topic['topic_name']; ?></h4>
                    <?php echo $content['answer']; ?>
                    <?php if ($content['table_image']): ?>
                        <img src="<?php echo SITE_DIR; ?>images/<?php echo $content['table_image']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="2">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($recommendations): ?>
                        <?php foreach ($recommendations as $recommendation): ?>
                            <table class="rec">
                                <tr>
                                    <td rowspan="2" class="rec-level">
                                        <?php echo $recommendation['recommendation_level']; ?>
                                    </td>
                                    <td class="rec-description">
                                        <?php echo $recommendation['description']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="rec-sublevel">
                                        <?php echo $recommendation['sub_level']; ?>
                                    </td>
                                </tr>
                            </table>
                            <?php echo $recommendation['recommendation_name']; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="3">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $content['consideration']; ?>
                </div>
            </div>
        </div>
    </div>
</div>