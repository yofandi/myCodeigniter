<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- header -->
        <?php $this->load->view($in['header']); ?>
    </head>
    <body>
        <!-- Navigation-->
        <?php $this->load->view($in['navbar']); ?>


        <!-- Head title-->
        <?php $this->load->view($in['headtitle']); ?>
        
        <!-- Main Content-->
        <?php if ($in['content'] != ''): ?>
            <?php $this->load->view($in['content'],$in['data']); ?>
        <?php endif ?>

        <!-- Footer-->
        <?php $this->load->view($in['footer']); ?>

        <!-- bottom -->
         <?php $this->load->view($in['bottom']); ?>
    </body>
</html>
