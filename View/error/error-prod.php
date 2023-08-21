<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->vars->view->page_title;?></title>
        <meta name="viewport" content="width=device-width,height=device-height initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="<?php $this->getAsset("/jquery-3.7.0.js");?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container" style="margin: 1%;padding: 1%;max-width: 98%;background-color: grey">
            <div class="card mb-12" style="background-color: black; color: salmon">
                <div class="row g-0">
                    <div class="col-md-3">
                        <div class="card-body">
                            <h3 class="card-title"><b><?php echo $this->vars->view->page_title;?></b></h3>
                        </div>    
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4 class="card-title"><b>Application</b></h4>
                            <h5 class="card-title"><?php echo "CyberSecProject";?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-12" style="background-color: salmon; color: black">
                <div class="row g-0">
                    <div class="col-md-3">
                        <div class="card-body">
                            <h4 class="card-title"><b>Exception</b></h4>
                            <h6 class="card-title"><b><?php echo $this->vars->exception->class;?></b></h6>
                        </div>    
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h6 class="card-title"><b>Message: </b><?php echo $this->vars->exception->message;?></h6>
                            <h6 class="card-text"><b>Severity: </b><?php echo $this->vars->exception->severityMessage;?></h6>
                            <h6 class="card-text"><b>Code: </b><?php echo $this->vars->exception->code;?></h6>
                            <h6 class="card-text"><b>File: </b><?php echo $this->vars->exception->file;?></h6>
                            <h6 class="card-text"><b>Line: </b><?php echo $this->vars->exception->line;?></h6>                            
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($this->vars->exception->trace as $key=>$value): ?>
                <div class="card mb-12" style="background-color: salmon; color: black">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo "Trace - $key";?></b></h5>
                            </div>    
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h6 class="card-title"><b>File: </b><?php echo $value->file;?></h6>
                                <h6 class="card-text"><b>Class: </b><?php echo $value->class;?></h6>
                                <h6 class="card-text"><b>Function: </b><?php echo $value->function;?></h6>
                                <h6 class="card-text"><b>Line: </b><?php echo $value->line;?></h6>                         
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        
    </body>
</html>
    

