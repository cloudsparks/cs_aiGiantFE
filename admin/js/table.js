/**
 * Javascript functions for tables
 * 
 **/

/** 
*   This function is to create a table
*   data should be in this format
*   {th1:[array],th2:[array],th3:[a,b,c,d,e]}
*   tableId - ID for your table
*   divId - ID of the div which will wrap your table
*   thArray - The column name of your table in db
*   btnArray - The amount of buttons you want to have in this table
*   message - The message to show if there is no data
*   tableNo - If this is set, replace ID with table numbering.
* 
**/
function buildTable(data, tableId, divId, thArray, btnArray, message, tableNo) {
    var btnArrayIsObject = jQuery.isPlainObject(btnArray) ? 1 : 0;

    $('#'+divId).find('table#'+tableId).remove();
    $('#'+divId).prev().removeClass('alert-success').html('').hide();

    if(!data){
        $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
        return;
    }

    $('#'+divId).append('<table id="'+tableId+'" class="table table-striped table-bordered no-footer m-0"></table>');
    $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
    $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

    var objKey;
    objKey = Object.keys(data);

    // Remove this block of code once all listing done changing
    if(thArray.length < 2) {
        thArray = [];
        objKey = Object.keys(data);
        $.each(objKey, function(key, val) {
           thArray.push(val.split('_').join(' '));
        });
    }
    // Till here

    // Loop to insert table headers
    $.each(thArray, function(key, val) {
        // $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        if(val=='check')
            $('#'+tableId).find('thead tr').append(`<th><input id='selectAll' type='checkbox' onclick='selectAllOnOff("${tableId}")' ></th>`);
        else
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
    });

    if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {
        $('#'+tableId).find('thead tr').append('<th></th>');
    }

    //Counter for iconArray
    var k = 0;
    iconArray = [];
    $.each(btnArray, function(key, val) {
        if (!btnArrayIsObject) key = val;

        if (key == 'edit')
            iconArray.push('edit');
        else if (key == 'delete' || key == 'reject')
            iconArray.push('trash');
        else if (key == 'view')
            iconArray.push('eye');
        else if (key == 'freewalletView')
            iconArray.push('eye');
        else if (key == 'cancel')
            iconArray.push('times');
        else if (key == 'cart')
            iconArray.push('cart-arrow-down');
         else if (key == 'activate')
            iconArray.push('power-off');
          else if (key == 'release')
            iconArray.push('paper-plane');
        else if (key == 'invoice')
            iconArray.push('file-text-o');
        else if (key == 'check')
            iconArray.push('check');
        else if (key == 'password')
            iconArray.push('lock');
        else if (key == 'download')
            iconArray.push('download');
        else if (key == 'update')
            iconArray.push('save');
    });

    var j = 0;
    while(j < data.length) {
        $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');

        var col = Object.keys(data[j]);
        $('#'+tableId).find('tr#'+j).attr('data-th', data[j][col[0]]);
        for(var i=0; i<col.length; i++) {
            if(col[i] == 'clientID' || col[i] == 'settingID')continue;
            $('#'+tableId).find('tr#'+j).append('<td>'+data[j][col[i]]+'</td>');
        };

        if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {

            $('#'+tableId).find('tr#'+j).append('<td></td>');
            k = 0;
            $.each(btnArray, function(key, value) {
                if (!btnArrayIsObject) key = value;

                var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);

                $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
                k++;
            });
        }
        j++;
    }

    if(tableNo) {
        var endRow = tableNo.pageNumber * tableNo.numRecord;
        var startRow = endRow - tableNo.numRecord + 1;
//        $('#'+tableId).find('th:first-child').html('No.');
        var tdRowCount = 1;
        while(startRow <= endRow){
            $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
            startRow++;
            tdRowCount++;
        }
    }
    // To initialize the tooltip
    $('[data-toggle="tooltip"]').tooltip();
}

function selectAllOnOff(tableId){
    console.log(tableId);
    var checked = 0
    if( $('#selectAll').prop("checked") == true){
        checked = 1;
    }
   
    // var checkedIDs = [];
    $('#'+tableId).find('tbody [type="checkbox"]').each(function() {
        // var checkboxID = $(this).val();
        $(this).prop("checked", checked);
    });
}


function buildTable2(data, tableId, divId, thArray, btnArray, message, tableNo, editable) {
    var btnArrayIsObject = jQuery.isPlainObject(btnArray) ? 1 : 0;

    $('#'+divId).find('table#'+tableId).remove();
    $('#'+divId).prev().removeClass('alert-success').html('').hide();

    if(!data){
        $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
        return;
    }

    $('#'+divId).append('<table id="'+tableId+'" class="table table-striped table-bordered no-footer m-0"></table>');
    $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
    $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

    var objKey;
    objKey = Object.keys(data);

    // Remove this block of code once all listing done changing
    if(thArray.length < 2) {
        thArray = [];
        objKey = Object.keys(data);
        $.each(objKey, function(key, val) {
           thArray.push(val.split('_').join(' '));
        });
    }
    // Till here

    // Loop to insert table headers
    $.each(thArray, function(key, val) {
        if(val=='check')
            $('#'+tableId).find('thead tr').append("<th><input id='selectAll' type='checkbox' onclick='selectAllOnOff('"+tableId+"')' ></th>");
        else
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
    });

    if(btnArray.length > 0) {
        $('#'+tableId).find('thead tr').append('<th></th>');
    }

    //Counter for iconArray
    var k = 0;
    iconArray = [];
    $.each(btnArray, function(key, val) {
        if (!btnArrayIsObject) key = val;

        if (key == 'edit')
            iconArray.push('edit');
        else if (key == 'delete' || key == 'reject')
            iconArray.push('trash');
        else if (key == 'view')
            iconArray.push('eye');
        else if (key == 'freewalletView')
            iconArray.push('eye');
        else if (key == 'cancel')
            iconArray.push('times');
        else if (key == 'cart')
            iconArray.push('cart-arrow-down');
         else if (key == 'activate')
            iconArray.push('power-off');
          else if (key == 'release')
            iconArray.push('paper-plane');
        else if (key == 'invoice')
            iconArray.push('file-text-o');
        else if (key == 'check')
            iconArray.push('check');
        else if (key == 'password')
            iconArray.push('lock');
    });

    var j = 0;
    while(j < data.length) {
        $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');

        var col = Object.keys(data[j]);
        $('#'+tableId).find('tr#'+j).attr('data-th', data[j][col[0]]);
        for(var i=0; i<col.length; i++) {
            if(col[i] == 'clientID' || col[i] == 'settingID')continue;
            if(editable.includes(col[i])){
            	$('#'+tableId).find('tr#'+j).append('<td><div class="row_data" col_name="'+col[i]+'" >'+data[j][col[i]]+'</div></td>');
            }else{
            	$('#'+tableId).find('tr#'+j).append('<td><div col_name="'+col[i]+'" >'+data[j][col[i]]+'</div></td>');
            }
        };

        if(btnArray.length > 0) {

            $('#'+tableId).find('tr#'+j).append('<td></td>');
            k = 0;
            $.each(btnArray, function(key, value) {
                if (!btnArrayIsObject) key = value;

                var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);

                $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
                k++;
            });
        }
        j++;
    }

    if(tableNo) {
        var endRow = tableNo.pageNumber * tableNo.numRecord;
        var startRow = endRow - tableNo.numRecord + 1;
//        $('#'+tableId).find('th:first-child').html('No.');
        var tdRowCount = 1;
        while(startRow <= endRow){
            $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
            startRow++;
            tdRowCount++;
        }
    }
    // To initialize the tooltip
    $('[data-toggle="tooltip"]').tooltip();
}


// If exec feedback see all function hang then can change to this function
function getSeeAllData(data, tableId, divId, thArray, btnArray, message, tableNo, addColor) {

    var newDataList = data;

    var btnArrayIsObject = jQuery.isPlainObject(btnArray) ? 1 : 0;

    $('#'+divId).find('table#'+tableId).remove();
    $('#'+divId).prev().removeClass('alert-success').html('').hide();

    if(!data){
        $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
        return;
    }

    $('#'+divId).append('<table id="'+tableId+'" class="table table-striped table-bordered no-footer m-0"></table>');
    $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
    $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

    var objKey;
    objKey = Object.keys(data);

    // Remove this block of code once all listing done changing
    if(thArray.length < 2) {
        thArray = [];
        objKey = Object.keys(data);
        $.each(objKey, function(key, val) {
           thArray.push(val.split('_').join(' '));
        });
    }
    // Till here

    // Loop to insert table headers
    $.each(thArray, function(key, val) {
        // $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        if(val=='check')
            $('#'+tableId).find('thead tr').append(`<th><input id='selectAll' type='checkbox' onclick='selectAllOnOff("${tableId}")' ></th>`);
        else
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
    });

    if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {
        $('#'+tableId).find('thead tr').append('<th></th>');
    }

    //Counter for iconArray
    var k = 0;
    iconArray = [];
    $.each(btnArray, function(key, val) {
        if (!btnArrayIsObject) key = val;

        if (key == 'edit')
            iconArray.push('edit');
        else if (key == 'delete' || key == 'reject')
            iconArray.push('trash');
        else if (key == 'view')
            iconArray.push('eye');
        else if (key == 'freewalletView')
            iconArray.push('eye');
        else if (key == 'cancel')
            iconArray.push('times');
        else if (key == 'cart')
            iconArray.push('cart-arrow-down');
         else if (key == 'activate')
            iconArray.push('power-off');
          else if (key == 'release')
            iconArray.push('paper-plane');
        else if (key == 'invoice')
            iconArray.push('file-text-o');
        else if (key == 'check')
            iconArray.push('check');
        else if (key == 'password')
            iconArray.push('lock');
        else if (key == 'download')
            iconArray.push('download');
        else if (key == 'setting')
            iconArray.push('cog');
        else if (key == 'save')
            iconArray.push('save');
    });

    var j = 0;
    var maxLen = 50;
    while(j < maxLen) {
        $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');

        var col = Object.keys(newDataList[j]);
        $('#'+tableId).find('tr#'+j).attr('data-th', newDataList[j][col[0]]);
        for(var i=0; i<col.length; i++) {
            if(col[i] == 'clientID' || col[i] == 'settingID')continue;
            $('#'+tableId).find('tr#'+j).append('<td>'+newDataList[j][col[i]]+'</td>');
        };

        if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {

            $('#'+tableId).find('tr#'+j).append('<td></td>');
            k = 0;
            $.each(btnArray, function(key, value) {
                if (!btnArrayIsObject) key = value;

                var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);

                $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
                k++;
            });
        }
        j++;
    }

    
    // To initialize the tooltip
    $('[data-toggle="tooltip"]').tooltip();

    j = 50;
    maxLen = 100;
    var scrollData = newDataList;

    $(window).on( "scroll" , function() {

         var $document = $(document);
         var $window = $(this);

         // j = j+50;
         // maxLen = maxLen+50;

         // alert(`J: ${j}, MaxLen: ${maxLen}, WithdrawalLen: ${data.withdrawalList.length}`);

         if( $document.scrollTop() >= $document.height() - $window.height() - 600 ) {

            // j = j+50;

            maxLen = j+50;


            // alert(1);

            while(j < maxLen) {

                if(j < newDataList.length) {

                    $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');

                    var col = Object.keys(scrollData[j]);
                    $('#'+tableId).find('tr#'+j).attr('data-th', scrollData[j][col[0]]);
                    for(var i=0; i<col.length; i++) {
                        if(col[i] == 'clientID' || col[i] == 'settingID')continue;
                        $('#'+tableId).find('tr#'+j).append('<td>'+scrollData[j][col[i]]+'</td>');
                    };

                    if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {

                        $('#'+tableId).find('tr#'+j).append('<td></td>');
                        k = 0;
                        $.each(btnArray, function(key, value) {
                            if (!btnArrayIsObject) key = value;

                            var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);

                            $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
                            k++;
                        });
                    }
                }else{
                    break;
                }
                j++;
            }

            if(addColor) {
                addColor(tableId);
            }
         }

    });
}


/** 
*   This function is to create pagination on the table
*   tableId - ID for your table
*   pagerId - ID of the ul for the pagination index
*   showPrevNext - Show previous/next buttons on both sides (True/False)
*   showPageNum - Show page numbers in your pagination (True/False)
*   rowsPerPage - Rows of data to be showed in a page
**/

function paginateTable(tableId, pagerId, showPrevNext, showPageNum, rowsPerPage) {
    var pagerSize = 10;
    var pagerLeftInterval = 4;
    var pagerRightInterval = 4;
    var table = $('#'+tableId);
    var pager = $('#'+pagerId);
    
    if (table.hasClass('search_res')) {
        pager.find('li').remove();
        var tableRows = table.find('tbody tr.search_res');
    }
    else
        var tableRows = table.find('tbody tr');
    
    var totalRows = tableRows.length;
    var numPages = Math.ceil(totalRows/rowsPerPage);
    
    if(pagerSize > numPages) {
        pagerSize = numPages;
    }
    
    if(showPrevNext) {
        pager.append('<li class="link"><a href="#" class="firstLink">First</a></li>');
        pager.append('<li class="link"><a href="#" class="prevLink">«</a></li>');
    }
    var curr = 0;
    while(numPages > curr && showPageNum == 1) {
        pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
        curr++;
    }
    if(showPrevNext) {
        pager.append('<li class="link"><a href="#" class="nextLink">»</a></li>');
        pager.append('<li class="link"><a href="#" class="lastLink">Last</a></li>');
    }
    
    
    function paginateNum(pageNum) {
        pager.find('li').not('.link').hide();
        
        var pagerMin = pageNum - pagerLeftInterval;
        var pagerMax = pageNum + pagerRightInterval;
        if(pagerMin < 0) {
            pagerMin = 0;
            pagerMax = pagerSize;
        }
        pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
    }
    
    pager.find('.pageLink:first').addClass('active');
    pager.find('.prevLink').hide();
    pager.find('.firstLink').hide();
    if (numPages <= 1) {
        pager.find('.nextLink').hide();
        pager.find('.lastLink').hide();
        // This is to hide the number links if there's only one page
        pager.find('.pageLink').hide();
    }
    pager.children().eq(2).addClass("active");
    paginateNum(1);
    tableRows.hide();
    tableRows.slice(0, rowsPerPage).show();
    
    pager.find('.pageLink').click(function() {
        var pageNum = $(this).html().valueOf()-1;
        goPage(pageNum);
        return false;
    });
    pager.find('.prevLink').click(function() {
        previousPage();
        return false;
    });
    pager.find('.nextLink').click(function() {
        nextPage();
        return false;
    });
    pager.find('.firstLink').click(function() {
        var pageNum = 0;
        goPage(pageNum);
        return false;
    });
    pager.find('.lastLink').click(function() {
        var pageNum = numPages-1;
        goPage(pageNum);
        return false;
    });
    
    function previousPage() {
        var go = parseInt(pager.find('li.active a').text())-1;
        go = go-1;
        goPage(go);
    }
    
    function nextPage() {
        var go = parseInt(pager.find('li.active a').text())-1;
        go = go+1;
        goPage(go);
    }
    
    function goPage(pageNum) {
        var start = pageNum * rowsPerPage;
        var end = start + rowsPerPage;
        
        tableRows.css('display','none').slice(start, end).show();
        
        if (pageNum >= 1) {
            pager.find('.prevLink').show();
            pager.find('.firstLink').show();
        }
        else {
            pager.find('.prevLink').hide();
            pager.find('.firstLink').hide();
        }
        
        if (pageNum < (numPages-1)) {
            pager.find('.nextLink').show();
            pager.find('.lastLink').show();
        }
        else {
            pager.find('.nextLink').hide();
            pager.find('.lastLink').hide();
        }
        paginateNum(pageNum);
        pager.children().removeClass("active");
        pager.children().eq(pageNum+1+1).addClass("active");
    }
}

/** 
*   This function is to search the table
*   Last 4 parameters is to rebuild the pagination.
*   Use back the same parameters so that they won't realise that the pagination is rebuild
*   tableId - ID for your table
*   searchId - ID of the input field for search
*   pagerId - ID of the ul for the pagination index
*   showPrevNext - Show previous/next buttons on both sides (True/False)
*   showPageNum - Show page numbers in your pagination (True/False)
*   rowsPerPage - Rows of data to be showed in a page
**/

function searchTable(tableId, searchId, pagerId, showPrevNext, showPageNum, rowsPerPage) {
    var input, filter, table;
    input = $('#'+searchId);
    filter = input.val().toUpperCase();
    table = $('#'+tableId);
    table.addClass('search_res');
    
    table.find('tbody tr').each(function() {
        var tr = $(this);
        tr.find('td').each(function() {
            var td = $(this);
            if(td.text().toUpperCase().indexOf(filter) > -1) {
                td.parent('tr').addClass('search_res');
                return false;
            }
            else {
                td.parent('tr').removeClass('search_res');
                td.parent('tr').hide();
            }
        });
    });
    
    var i=0;
    table.removeClass('table-striped');
    table.find('tr.search_res').each(function() {
        var tr = $(this);
        if (i % 2 == 0) {
            tr.css('background-color', '#f4f8fb');
        }
        else {
            tr.css('background-color', '#fff');
        }
        i++;
    });
    
    paginate_table(tableId, pagerId, showPrevNext, showPageNum, rowsPerPage);
}

function pagination(pagerId, pageNumber, totalPage, totalRecord, numRecord) {
    var pager = $('#'+pagerId);
    var endRow = pageNumber * numRecord;
    var startRow = endRow - numRecord + 1;
    
    var pagerSize = 10;
    var pagerLeftInterval = 4;
    var pagerRightInterval = 4;
    
    var spanText = pager.parent('div').prev();
    spanText.html('');
    pager.find('li').remove();
    if(!totalPage) return;

    if (endRow > totalRecord)
        endRow = totalRecord;

    var paginateMsg = translations['A00060'][language]; /* Showing %%from%% - %%to%% of %%total%% records. */ 
    
    var findText = ['%%from%%', '%%to%%', '%%total%%'];
    var replaceText = [startRow, endRow, totalRecord];
    
    $.each(findText, function(k, val) {
        paginateMsg = paginateMsg.replace(val, replaceText[k], paginateMsg);
    });
    
    spanText.html(paginateMsg);
    // spanText.html('Showing ' + startRow + ' - ' + endRow + ' of ' + totalRecord + ' records.');

    if(pagerSize > totalPage) {
        pagerSize = totalPage;
    }

    if(pageNumber > 1) {
        var paginateFirst = translations['A00058'][language]; /* First */
        pager.append('<li class="link"><a href="#" class="firstLink">'+paginateFirst+'</a></li>');
        pager.append('<li class="link"><a href="#" class="prevLink">«</a></li>');
    }
    var curr = 0;
    while(totalPage > curr && totalPage > 1) {
        pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
        curr++;
    }
    if(pageNumber < totalPage) {
        var paginateLast = translations['A00059'][language]; /* Last */
        pager.append('<li class="link"><a href="#" class="nextLink">»</a></li>');
        pager.append('<li class="link"><a href="#" class="lastLink">'+paginateLast+'</a></li>');
    }
    
    function paginateNum(pageNum) {
        pager.find('li').not('.link').hide();
        pageNum-=1;
        var pagerMin = pageNum - pagerLeftInterval;
        var pagerMax = pageNum + pagerRightInterval;
        if(pagerMin < 0) {
            pagerMin = 0;
            pagerMax = pagerSize;
        }
        pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
    }
    
    var eq = parseInt(pageNumber)-1;

    pager.find('li').not('.link').eq(eq).addClass("active");
    paginateNum(parseInt(pageNumber));
    
    pager.find('.pageLink').click(function() {
        var pageNum = $(this).html().valueOf();
        goPage(pageNum);

    });
    pager.find('.prevLink').click(function() {
        var pageNum = parseInt(pager.find('li.active a').text())-1;
        goPage(pageNum);
    });
    pager.find('.nextLink').click(function() {
        var pageNum = parseInt(pager.find('li.active a').text())+1;
        goPage(pageNum);
    });
    pager.find('.firstLink').click(function() {
        var pageNum = 0;
        goPage(pageNum);
    });
    pager.find('.lastLink').click(function() {
        var pageNum = totalPage;
        goPage(pageNum);
    });
    
    function goPage(pageNum) {
        paginateNum(pageNum);
        pager.children().removeClass("active");
        pager.children().eq(pageNum+1).addClass("active");
        pagingCallBack(pageNum);

    }
}

/**
 * Javascript functions for tables
 * 
 **/

/** 
*   This function is to create a table
*   data should be in this format
*   {th1:[array],th2:[array],th3:[a,b,c,d,e]}
*   tableId - ID for your table
*   divId - ID of the div which will wrap your table
*   thArray - The column name of your table in db
*   btnArray - The amount of buttons you want to have in this table
*   message - The message to show if there is no data
*   tableNo - If this is set, replace ID with table numbering.
* 
**/
// function buildTable(data, tableId, divId, thArray, btnArray, message, tableNo) {
//     var btnArrayIsObject = jQuery.isPlainObject(btnArray) ? 1 : 0;
    
//     $('#'+divId).find('table#'+tableId).remove();
//     $('#'+divId).prev().removeClass('alert-success').html('').hide();

//     if(!data){
//         $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
//         return;
//     }

//     $('#'+divId).append('<table id="'+tableId+'" class="table table-striped table-bordered no-footer m-0"></table>');
//     $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
//     $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');
    
//     var objKey;
//     objKey = Object.keys(data);
    
//     // Remove this block of code once all listing done changing
//     if(thArray.length < 2) {
//         thArray = [];
//         objKey = Object.keys(data);
//         $.each(objKey, function(key, val) {
//            thArray.push(val.split('_').join(' ')); 
//         });
//     }
//     // Till here
    
//     // Loop to insert table headers
//     /*$.each(thArray, function(key, val) {
//         $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
//     });*/

//     $.each(thArray, function(key, val) {
//         if(val == "check"){
//             $('#'+tableId).find('thead tr').append('<th><input id="selectAll" type="checkbox" onclick="selectAllOnOff(\''+tableId+'\')"></th>');
//         }else{
//             $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
//         }
//     });
//     console.log("good");
//     if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {
//         $('#'+tableId).find('thead tr').append('<th></th>');
//     }

//     var Edit = translations['A00249'][language];
//     var Delete = 'Delete';
//     var View = translations['A00453'][language];
//     var Cancel = translations['A00660'][language];
//     var Buy = translations['A00953'][language];

    
//     //Counter for iconArray
//     var k = 0;
//     iconArray = [];
//     $.each(btnArray, function(key, val) {
        
//         if (!btnArrayIsObject) key = val;

//         if (key == 'edit')
//             iconArray.push(Edit);
//         else if (key == 'delete' || key == 'reject')
//             iconArray.push(Delete);
//         else if (key == 'view')
//             iconArray.push(View);
//         else if (key == 'cancel')
//             iconArray.push(Cancel);
//         else if (key == 'cart')
//             iconArray.push(Buy);
//     });
    
//     var j = 0;
//     while(j < data.length) {
//         $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');
        
//         var col = Object.keys(data[j]);
//         $('#'+tableId).find('tr#'+j).attr('data-th', data[j][col[0]]);
//         for(var i=0; i<col.length; i++) {
//             if(col[i] == 'clientID' || col[i] == 'settingID' || col[i] == 'tableID' )continue;
//             $('#'+tableId).find('tr#'+j).append('<td>'+data[j][col[i]]+'</td>');
//         };

//         if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {

//             $('#'+tableId).find('tr#'+j).append('<td></td>');
//             k = 0;
//             $.each(btnArray, function(key, value) {
//                 if (!btnArrayIsObject) key = value;
                
//                 var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);
                
//                 // $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" style="margin:0px 4px 0px 4px" class="btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
//                 $('#'+tableId).find('tr#'+j+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+j+'" onclick="tableBtnClick(this.id)" style="margin:0px 4px 0px 4px" class="btn btn-icon waves-effect waves-light btn-primary"><span>'+iconArray[k]+'</span></a>');
                
//                 k++;
//             });
//         }
//         j++;
//     }
    
//     if(tableNo) {
//         var endRow = tableNo.pageNumber * tableNo.numRecord;
//         var startRow = endRow - tableNo.numRecord + 1;
// //        $('#'+tableId).find('th:first-child').html('No.');
//         var tdRowCount = 1;
//         while(startRow <= endRow){
//             $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
//             startRow++;
//             tdRowCount++;
//         }
//     }
//     // To initialize the tooltip
//     $('[data-toggle="tooltip"]').tooltip();
// }

/** 
*   This function is to create pagination on the table
*   tableId - ID for your table
*   pagerId - ID of the ul for the pagination index
*   showPrevNext - Show previous/next buttons on both sides (True/False)
*   showPageNum - Show page numbers in your pagination (True/False)
*   rowsPerPage - Rows of data to be showed in a page
**/

function paginateTable(tableId, pagerId, showPrevNext, showPageNum, rowsPerPage) {
    var pagerSize = 10;
    var pagerLeftInterval = 4;
    var pagerRightInterval = 4;
    var table = $('#'+tableId);
    var pager = $('#'+pagerId);
    
    if (table.hasClass('search_res')) {
        pager.find('li').remove();
        var tableRows = table.find('tbody tr.search_res');
    }
    else
        var tableRows = table.find('tbody tr');
    
    var totalRows = tableRows.length;
    var numPages = Math.ceil(totalRows/rowsPerPage);
    
    if(pagerSize > numPages) {
        pagerSize = numPages;
    }
    
    if(showPrevNext) {
        pager.append('<li class="link"><a href="#" class="firstLink">First</a></li>');
        pager.append('<li class="link"><a href="#" class="prevLink">«</a></li>');
    }
    var curr = 0;
    while(numPages > curr && showPageNum == 1) {
        pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
        curr++;
    }
    if(showPrevNext) {
        pager.append('<li class="link"><a href="#" class="nextLink">»</a></li>');
        pager.append('<li class="link"><a href="#" class="lastLink">Last</a></li>');
    }
    
    
    function paginateNum(pageNum) {
        pager.find('li').not('.link').hide();
        
        var pagerMin = pageNum - pagerLeftInterval;
        var pagerMax = pageNum + pagerRightInterval;
        if(pagerMin < 0) {
            pagerMin = 0;
            pagerMax = pagerSize;
        }
        pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
    }
    
    pager.find('.pageLink:first').addClass('active');
    pager.find('.prevLink').hide();
    pager.find('.firstLink').hide();
    if (numPages <= 1) {
        pager.find('.nextLink').hide();
        pager.find('.lastLink').hide();
        // This is to hide the number links if there's only one page
        pager.find('.pageLink').hide();
    }
    pager.children().eq(2).addClass("active");
    paginateNum(1);
    tableRows.hide();
    tableRows.slice(0, rowsPerPage).show();
    
    pager.find('.pageLink').click(function() {
        var pageNum = $(this).html().valueOf()-1;
        goPage(pageNum);
        return false;
    });
    pager.find('.prevLink').click(function() {
        previousPage();
        return false;
    });
    pager.find('.nextLink').click(function() {
        nextPage();
        return false;
    });
    pager.find('.firstLink').click(function() {
        var pageNum = 0;
        goPage(pageNum);
        return false;
    });
    pager.find('.lastLink').click(function() {
        var pageNum = numPages-1;
        goPage(pageNum);
        return false;
    });
    
    function previousPage() {
        var go = parseInt(pager.find('li.active a').text())-1;
        go = go-1;
        goPage(go);
    }
    
    function nextPage() {
        var go = parseInt(pager.find('li.active a').text())-1;
        go = go+1;
        goPage(go);
    }
    
    function goPage(pageNum) {
        var start = pageNum * rowsPerPage;
        var end = start + rowsPerPage;
        
        tableRows.css('display','none').slice(start, end).show();
        
        if (pageNum >= 1) {
            pager.find('.prevLink').show();
            pager.find('.firstLink').show();
        }
        else {
            pager.find('.prevLink').hide();
            pager.find('.firstLink').hide();
        }
        
        if (pageNum < (numPages-1)) {
            pager.find('.nextLink').show();
            pager.find('.lastLink').show();
        }
        else {
            pager.find('.nextLink').hide();
            pager.find('.lastLink').hide();
        }
        paginateNum(pageNum);
        pager.children().removeClass("active");
        pager.children().eq(pageNum+1+1).addClass("active");
    }
}

/** 
*   This function is to search the table
*   Last 4 parameters is to rebuild the pagination.
*   Use back the same parameters so that they won't realise that the pagination is rebuild
*   tableId - ID for your table
*   searchId - ID of the input field for search
*   pagerId - ID of the ul for the pagination index
*   showPrevNext - Show previous/next buttons on both sides (True/False)
*   showPageNum - Show page numbers in your pagination (True/False)
*   rowsPerPage - Rows of data to be showed in a page
**/

function searchTable(tableId, searchId, pagerId, showPrevNext, showPageNum, rowsPerPage) {
    var input, filter, table;
    input = $('#'+searchId);
    filter = input.val().toUpperCase();
    table = $('#'+tableId);
    table.addClass('search_res');
    
    table.find('tbody tr').each(function() {
        var tr = $(this);
        tr.find('td').each(function() {
            var td = $(this);
            if(td.text().toUpperCase().indexOf(filter) > -1) {
                td.parent('tr').addClass('search_res');
                return false;
            }
            else {
                td.parent('tr').removeClass('search_res');
                td.parent('tr').hide();
            }
        });
    });
    
    var i=0;
    table.removeClass('table-striped');
    table.find('tr.search_res').each(function() {
        var tr = $(this);
        if (i % 2 == 0) {
            tr.css('background-color', '#f4f8fb');
        }
        else {
            tr.css('background-color', '#fff');
        }
        i++;
    });
    
    paginate_table(tableId, pagerId, showPrevNext, showPageNum, rowsPerPage);
}

function pagination(pagerId, pageNumber, totalPage, totalRecord, numRecord) {
    var pager = $('#'+pagerId);
    var endRow = pageNumber * numRecord;
    var startRow = endRow - numRecord + 1;
    
    var pagerSize = 10;
    var pagerLeftInterval = 4;
    var pagerRightInterval = 4;
    
    var spanText = pager.parent('div').prev();
    spanText.html('');
    pager.find('li').remove();
    if(!totalPage) return;

    if (endRow > totalRecord)
        endRow = totalRecord;

    var paginateMsg = translations['A00060'][language]; /* Showing %%from%% - %%to%% of %%total%% records. */ 
    
    var findText = ['%%from%%', '%%to%%', '%%total%%'];
    var replaceText = [startRow, endRow, totalRecord];
    
    $.each(findText, function(k, val) {
        paginateMsg = paginateMsg.replace(val, replaceText[k], paginateMsg);
    });
    
    spanText.html(paginateMsg);
    // spanText.html('Showing ' + startRow + ' - ' + endRow + ' of ' + totalRecord + ' records.');

    if(pagerSize > totalPage) {
        pagerSize = totalPage;
    }

    if(pageNumber > 1) {
        var paginateFirst = translations['A00058'][language]; /* First */
        pager.append('<li class="link"><a href="#" class="firstLink">'+paginateFirst+'</a></li>');
        pager.append('<li class="link"><a href="#" class="prevLink">«</a></li>');
    }
    var curr = 0;
    while(totalPage > curr && totalPage > 1) {
        pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
        curr++;
    }
    if(pageNumber < totalPage) {
        var paginateLast = translations['A00059'][language]; /* Last */
        pager.append('<li class="link"><a href="#" class="nextLink">»</a></li>');
        pager.append('<li class="link"><a href="#" class="lastLink">'+paginateLast+'</a></li>');
    }
    
    function paginateNum(pageNum) {
        pager.find('li').not('.link').hide();
        pageNum-=1;
        var pagerMin = pageNum - pagerLeftInterval;
        var pagerMax = pageNum + pagerRightInterval;
        if(pagerMin < 0) {
            pagerMin = 0;
            pagerMax = pagerSize;
        }
        pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
    }
    
    var eq = parseInt(pageNumber)-1;

    pager.find('li').not('.link').eq(eq).addClass("active");
    paginateNum(parseInt(pageNumber));
    
    pager.find('.pageLink').click(function() {
        var pageNum = $(this).html().valueOf();
        goPage(pageNum);

    });
    pager.find('.prevLink').click(function() {
        var pageNum = parseInt(pager.find('li.active a').text())-1;
        goPage(pageNum);
    });
    pager.find('.nextLink').click(function() {
        var pageNum = parseInt(pager.find('li.active a').text())+1;
        goPage(pageNum);
    });
    pager.find('.firstLink').click(function() {
        var pageNum = 0;
        goPage(pageNum);
    });
    pager.find('.lastLink').click(function() {
        var pageNum = totalPage;
        goPage(pageNum);
    });
    
    function goPage(pageNum) {
        paginateNum(pageNum);
        pager.children().removeClass("active");
        pager.children().eq(pageNum+1).addClass("active");
        pagingCallBack(pageNum);

    }
}

function buildBonusTable(data, tableId, tableBody, divId, btnArray, message, tableNo, pagerId, onloaded) {
    var btnArrayIsObject = jQuery.isPlainObject(btnArray) ? 1 : 0;
    var grandTotal = "";

    var headerList          = data.headerList;
    var grandTotalList      = data.grandTotalList;
    var bonusList           = data.bonusList;
    var bonusNameList       = data.bonusNameList;
    var totalBonusList      = data.totalBonusList;
    var pageNumber          = data.pageNumber;
    var totalPage           = data.totalPage;
    
    $('#'+divId).prev().removeClass('alert-success').html('').hide();

    if(!data){
        $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
        return;
    }

    if($('#'+divId).find('table#'+tableId).length == 0){
        $('#'+divId).append('<table id="'+tableId+'" class="table table-striped table-bordered no-footer m-0"></table>');
        $('#'+divId).find('table#'+tableId).append('<thead style="background:#fafafa"><tr></tr></thead>');
    }

    if(onloaded == 0 || (pageNumber <= 1) ){
        $('#'+divId).find('tbody#'+tableBody).remove();
        $('#'+divId).find('table#'+tableId).append('<tbody id= "'+tableBody+'"></tbody>');

    }

    if(grandTotalList){
        $('#grandTotalBonus').show();
        var grandTotal = "";
        
        grandTotal += `<div class="row">`;
        
        $.each(grandTotalList, function(key, list){
            grandTotal +=`<div class="col-md-4 col-sm-4 col-xs-12" style="padding:10px">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                                <span>${list.bonusName}&nbsp;&nbsp;&nbsp;</span>
                            </div>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <span style="font-size: 16px;font-weight: 700;">
                                ${addCormer(list.totalBonus)}
                                </span>
                            </div>   
                          </div>`;
        });

        grandTotal += `</div>
                            </div>`;

        $('#grandTotalBonus').empty().append(grandTotal);                 
    }

    // if(grandTotalList){

    //     grandTotal +='<table class="table-responsive" style="border:0px;">';
    //     grandTotal +=   '<thead>';
    //     $.each(grandTotalList, function(key, list){
    //         grandTotal +=       '<tr>';
    //         grandTotal +=           '<th style="text-align: left!important">'+list['bonusName']+' : </th>';
    //         grandTotal +=           '<td style="padding-left: 20px">'+list['totalBonus']+'</td>';
    //         grandTotal +=       '</tr>';
    //     });
    //     grandTotal +=   '</thead>';
    //     grandTotal +='</table>';

    //     $('#grandTotalBonus').empty().append(grandTotal);
    // }
    
    // Loop to insert table headers
    if(headerList){
        $('#'+tableId).find('thead tr').empty();
        $.each(headerList, function(key, val) {
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        });
    }

    if(btnArray){
    if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {
        $('#'+tableId).find('thead tr').append('<th></th>');
    }
    
    //Counter for iconArray
    var k = 0;
    iconArray = [];
    
        $.each(btnArray, function(key, val) {
        if (!btnArrayIsObject) key = val;
        
        if (key == 'edit')
            iconArray.push('edit');
        else if (key == 'delete')
            iconArray.push('trash');
        else if (key == 'view')
            iconArray.push('eye');
        else if (key == 'cancel')
            iconArray.push('times');
        else if (key == 'cart')
            iconArray.push('cart-arrow-down');
    });
    }
    if(bonusList){
    $('#basicwizard').show();
       var j = 0;
        while(j < bonusList.length) {
            var col = Object.keys(bonusList[j]);
            var id = bonusList[j][col[0]];

            $('#'+tableId).find('tbody').append('<tr id='+id+'></tr>');
            
            for(var i=1; i<col.length; i++) {
                if(col[i] == "checkbox" && bonusList[j][col[i]] == "1"){
                    $('#'+tableId).find('tr#'+id).append("<td><input name ='checkbox' type ='checkbox'></td>");
                }else{
                    $('#'+tableId).find('tr#'+id).append('<td>'+(bonusList[j][col[i]])+'</td>');
                }
            };

            $('#'+tableId).find('tr#'+j).attr('data-th', bonusList[j][col[0]]);

            if(btnArray.length > 0 || !jQuery.isEmptyObject(btnArray)) {
                $('#'+tableId).find('tr#'+id).append('<td></td>');
                k = 0;
                $.each(btnArray, function(key, value) {
                    if (!btnArrayIsObject) key = value;
                    
                    var tooltipTitle = value.charAt(0).toUpperCase() + value.slice(1);
                    
                    $('#'+tableId).find('tr#'+id+' td').last().append('<a data-toggle="tooltip" title="'+tooltipTitle+'" id="'+key+id+'" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-'+iconArray[k]+'"></i></a>');
                    k++;
                });
            }
            j++;
        } 

        if(totalBonusList){
            $('#'+tableId).find('tbody').append('<tr id="totalBonusList" style="font-weight:700;background-color: #ddd!important"></tr>');

            $.each(totalBonusList, function(key, value){
                $('#'+tableId).find('tr#totalBonusList').append('<td>'+addCormer(value)+'</td>');

            });
        }
    }else if (!bonusList){
        $('#tableList').empty();
        $('#alertMsg').addClass('alert-success').html('<span>No Result Found</span>').show();
    }
    
    if(tableNo) {
        var endRow = tableNo.pageNumber * tableNo.numRecord;
        var startRow = endRow - tableNo.numRecord + 1;
//        $('#'+tableId).find('th:first-child').html('No.');
        var tdRowCount = 1;
        while(startRow <= endRow){
            $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
            startRow++;
            tdRowCount++;
        }
    }

    // To initialize the tooltip
    $('[data-toggle="tooltip"]').tooltip();

    if(onloaded == 0){
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    else{
        $('#paginateText').empty();
        $('#'+pagerId).empty();
    }

    $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:eq(0)').css('white-space', "nowrap");
            $(this).find('td:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "right");
            $(this).find('td:eq(10)').css('text-align', "right");
            $(this).find('td:eq(11)').css('text-align', "right");
            $(this).find('td:eq(12)').css('text-align', "right");

    });

        // $('#'+tableId).tableExport({
        //         headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //         footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //         formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //         filename: 'Sales_Purchase_Report', // (id, String), filename for the downloaded file, (default: 'id')
        //         bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //         exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //         position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //         ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //         ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //         trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        //     });

            // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
            // $('button.xlsx').attr('type', 'button');
            // $('button.xlsx').text('Export to xlsx');



}

