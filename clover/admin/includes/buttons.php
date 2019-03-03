<div style="overflow: auto; ">
    <table class="table-condensed" style="margin: 0 auto;">
        <tr>
            <td class=" buttonform tooltip-bottom " id="hprevious" style="display: <? Echo $pdisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Previous">
                <button id='previous' type="button" class="btn btn-pad btn-square btn-square prevBtn hvr-float-shadow" style="background-color:#B38A6C; "  onClick="window.location.href = '<?= $file . "?mode=edit&$keyfld=$prevvouch" ?>'" <? Echo $pdisabled1 ?>>
                    <i class="fa fa-chevron-left" style="color:#ffffff"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hnext" style="display: <? Echo $ndisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Next">
                <button id='next' type="button" class="btn btn-pad btn-square nextBtn hvr-float-shadow" style="background-color:#F89693;  " onClick="window.location.href = '<?= $file . "?mode=edit&$keyfld=$nextvouch" ?>'" <? Echo $ndisabled1 ?>>
                    <i class="fa fa-chevron-right" style="color:#ffffff"></i>    
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hsearch" style="display: <? Echo $searchdisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Search">
                <button id="search" type="button" class="btn btn-pad btn-square " style="background-color:#B19CD9; " data-toggle="modal" data-target=".bs-example-modal-lg" >
                    <i class="fa fa-search" style="color:#ffffff"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hprint" style="display: <? Echo $printdisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Print">
                <button id='print' type="button" class="btn btn-pad btn-square " style="background-color:#5BC0DE; " onclick="window.open('<?= $printfile ?>?vouchno=<?= $qvouch; ?>', 'popUponclickWindow', 'height=600,width=970,left=20,top=20, resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">
                    <i class="fa fa-print" style="color:#ffffff"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hadd" style="display: <? Echo $adddisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Record" >
                <button id='add' type="button" class="btn btn-pad btn-square " style="background-color:#C0CA33; " onclick="window.location.href = '<?= $file . "?mode=true" ?>'" class="btn btn-labeled btn-success ">
                    <i class="fa fa-plus" style="color:#ffffff"></i>    
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hedit" style="display: <? Echo $editdisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit Record">
                <button id='edit' type="button" style="background-color:#F0AD4E; " class="btn btn-pad btn-square">
                    <i class="fa fa-pencil" style="color:#ffffff"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="hdelete" style="display: <? Echo $deletedisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete Record">
                <a id='delete' class="btn btn-pad btn-square delete-entry" href="?delete&<?= $keyfld . "=" . $qvouch . "" ?>"  onClick="return confirm('Confrim Delete?');" style="background-color:#D9534F;">
                    <i class="fa fa-trash" style="color:#ffffff"></i>
                </a>
            </td>
            <td class=" buttonform tooltip-bottom" id="hexit" style="display: <? Echo $exitdisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Exit">
                <button id='exit' type="button" class="btn btn-pad btn-square " style="background-color:#cccccc; "  onClick="window.location.href = '<?= 'default.php' ?>'">
                    <i class="fa fa-power-off" style="color:red"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="ssubmit" style="display: <? Echo $savedisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Save Record">
                <button id='submit' type='submit' name='submit' value='<?php echo ($addflag == 0) ? "Update" : "Save"; ?>' class="btn btn-pad btn-square " style="background-color:#008D4C; ">
                    <i class="fa fa-check" style="color:#ffffff"></i>
                </button>
            </td>
            <td class=" buttonform tooltip-bottom" id="scancel" style="display: <? Echo $canceldisabled ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Cancel Record">
                <button id='cancel' type="button" class="btn btn-pad btn-square " style="background-color:#39CCCC; "  onClick="window.location.href = '<?= $file . "?mode=last" ?>'">
                    <i class="fa fa-times" style="color:#ffffff"></i>
                </button>
            </td>
        </tr>
    </table>
</div>