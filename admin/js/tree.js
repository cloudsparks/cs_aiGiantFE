function buildPlacementTree(sponsor, downlines, treeDiv, placementChildNumber) {
    $("#"+treeDiv).addClass("table-responsive");
    //Append hierarchy diagram div
    $("#"+treeDiv).append('<div class="hv-hierarchy" style="margin:0; min-height:300px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
    //Append items to diagram
    $(".hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
    $(".hv-item").append('<div id="children'+sponsor['client_id']+'" class="hv-item-children"></div>');

    if(placementChildNumber == 2) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(sponsor['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(sponsor['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });

        recursiveBuildPlacementTwoChild(downlines, sponsor['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag);
    }
    else if(placementChildNumber == 3) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(sponsor['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(sponsor['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(sponsor['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });

        recursiveBuildPlacementThreeChild(downlines, sponsor['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
    }
    $(".hv-item").append('<br/>');
}

function recursiveBuildPlacementTwoChild(downlines, uplineID, leftDownline, rightDownline, leftFlag, rightFlag) {
    if(leftFlag) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+leftDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+leftDownline['client_id']).append('<div class="hv-item-parent"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
            $("#child"+leftDownline['client_id']).append('<div id="children'+leftDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementTwoChild(downlines, leftDownline['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append('<div class="hv-item-child"><p>Empty</p></div>');
    }

    if(rightFlag) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+rightDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+rightDownline['client_id']).append('<div class="hv-item-parent"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
            $("#child"+rightDownline['client_id']).append('<div id="children'+rightDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementTwoChild(downlines, rightDownline['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append('<div class="hv-item-child"><p>Empty</p></div>');
    }
}

function recursiveBuildPlacementThreeChild(downlines, uplineID, leftDownline, middleDownline, rightDownline, leftFlag, middleFlag, rightFlag) {
    if(leftFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+leftDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+leftDownline['client_id']).append('<div class="hv-item-parent"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
            $("#child"+leftDownline['client_id']).append('<div id="children'+leftDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, leftDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append('<div class="hv-item-child"><p>Empty</p></div>');
    }

    if(middleFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+middleDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+middleDownline['client_id']).append('<div class="hv-item-parent"><p id="'+middleDownline['client_id']+'" onclick="treeBranchClick(this)">'+middleDownline['username']+'</p></div>');
            $("#child"+middleDownline['client_id']).append('<div id="children'+middleDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, middleDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+middleDownline['client_id']+'" onclick="treeBranchClick(this)">'+middleDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append('<div class="hv-item-child"><p>Empty</p></div>');
    }

    if(rightFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+rightDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+rightDownline['client_id']).append('<div class="hv-item-parent"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
            $("#child"+rightDownline['client_id']).append('<div id="children'+rightDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, rightDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append('<div class="hv-item-child"><p>Empty</p></div>');
    }
}

function buildSponsorTree(sponsor, downlines, treeDiv, scrollFlag) {
    if(scrollFlag == 1) {
        $("#"+treeDiv).addClass("table-responsive");
        //Append hierarchy diagram div
        $("#"+treeDiv).append('<div class="hv-hierarchy" style="margin:0; height:450px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
        //Append items to diagram
        $(".hv-item").append('<br/><div class="hv-item-parent"><p><span style="color:#565681">'+sponsor['username']+'</span><br>My Unit : '+addCommas(Number(sponsor['selfInvestment']).toFixed(2))+'<br>Total Downline’s Unit: '+addCommas(Number(sponsor['downlineInvestment']).toFixed(2))+'<br></p></div>');
        $(".hv-item").append('<div class="hv-item-children"></div>');

        if(downlines.length > 0) {
            $.each(downlines, function(key, val) {
                $(".hv-item-children").append('<div class="hv-item-child"><p id="'+downlines[key]['client_id']+'" onclick="treeBranchClick(this)"><span style="color:#565681">'+downlines[key]['username']+'</span><br>My Unit : '+addCommas(Number(downlines[key]['selfInvestment']).toFixed(2))+'<br>Total Downline’s Unit: '+addCommas(Number(downlines[key]['downlineInvestment']).toFixed(2))+'</p></div>');
            });
        }
        else {
            $(".hv-item-children").append('<div class="hv-item-child"><p>Empty</p></div>');
        }
    }

    if(scrollFlag == 0) {
        //Append carousel
        $("#"+treeDiv).append('<div id="treeCarousel" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a class="left carousel-control" href="#treeCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#treeCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></div>');

        if(downlines.length > 0) {
            var j = 0; var d = 0;
            for(var i = 0; i < Math.ceil(downlines.length / 5); i++) {
                if(j == 0) {
                    //Append 1st carousel
                    $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="'+j+'" class="active"></li>');
                    $(".carousel-inner").append('<div id="diagram'+j+'" class="item active"></div>');
                    //Append hierarchy diagram div
                    $("#diagram"+j).append('<div class="hv-hierarchy" style="margin:0; height:450px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
                    //Append items to diagram
                    $("#diagram"+j+" .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
                    $("#diagram"+j+" .hv-item").append('<div class="hv-item-children"></div>');

                    for(var z = 0; z < 5; z++) {
                        $("#diagram"+j+" .hv-item-children").append('<div class="hv-item-child"><p id="'+downlines[d]['client_id']+'" onclick="treeBranchClick(this)">'+downlines[d]['username']+'</p></div>');
                        d++;
                        if(d == (downlines.length))
                            return false;
                    }
                }//Append 2nd carousel onwards
                else {
                    $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="'+j+'"></li>');
                    $(".carousel-inner").append('<div id="diagram'+j+'" class="item"></div>');
                    //Append hierarchy diagram div
                    $("#diagram"+j).append('<div class="hv-hierarchy" style="margin:0; height:450px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
                    //Append items to diagram
                    $("#diagram"+j+" .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
                    $("#diagram"+j+" .hv-item").append('<div class="hv-item-children"></div>');

                    for(var z = 0; z < 5; z++) {
                        $("#diagram"+j+" .hv-item-children").append('<div class="hv-item-child"><p id="'+downlines[d]['client_id']+'" onclick="treeBranchClick(this)">'+downlines[d]['username']+'</p></div>');
                        d++;
                        if(d == (downlines.length))
                            return false;
                    }
                }

                j++;

                if(d == (downlines.length))
                    return false;
            }
        }
        else {
            //Append 1st carousel
            $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="0" class="active"></li>');
            $(".carousel-inner").append('<div id="diagram0" class="item active"></div>');
            //Append hierarchy diagram div
            $("#diagram0").append('<div class="hv-hierarchy" style="margin:0; height:450px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
            //Append items to diagram
            $("#diagram0 .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
            $("#diagram0 .hv-item").append('<div class="hv-item-children"></div>');

            $("#diagram0 .hv-item-children").append('<div class="hv-item-child"><p>Empty</p></div>');
        }
    }
}