<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); } ?>

<?php $this->load->view('admin/admin/head', $this->data); ?>

<div class="line"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;"></span></div>
        </span>
        <h6>Danh sách Thành viên</h6>
        <div class="num f12">Tổng số: <b>0</b></div>
    </div>
    <form action="http://localhost/webphp/index.php/admin/user.html" method="get" class="form" name="filter">
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin/images/icons/tableArrows.png'); ?>"></td>
                    <td style="width:80px;">Mã số</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Điện thoại</td>
                    <td>Địa chỉ</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                                <span style="color:white;">Xóa hết</span>
                            </a>
                        </div>
                        <div class="pagination">
                        </div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <!-- Filter -->
                <tr>
                    <td>
                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" name="id[]" value="19" style="opacity: 0;"></span></div>
                    </td>
                    <td class="textC">19</td>
                    <td><span class="tipS" original-title="Hoàng văn Tuyền">
                            Hoàng văn Tuyền                     </span></td>
                    <td><span class="tipS" original-title="hoangvantuyencnt@gmail.com">
                            hoangvantuyencnt@gmail.com                      </span></td>
                    <td>
                        01686039488 </td>
                    <td>
                        111 </td>
                    <td class="option">
                        <a href="user/edit/19.html" class="tipS " original-title="Chỉnh sửa">
                            <img src="<?php echo public_url('admin/images/icons/color/edit.png'); ?>">
                        </a>
                        <a href="user/del/19.html" class="tipS verify_action" original-title="Xóa">
                            <img src="<?php echo public_url('admin/images/icons/color/delete.png'); ?>">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" name="id[]" value="16" style="opacity: 0;"></span></div>
                    </td>
                    <td class="textC">16</td>
                    <td><span class="tipS" original-title="Hoàng văn Tuyền">
                            Hoàng văn Tuyền                     </span></td>
                    <td><span class="tipS" original-title="tuyenht90@yahoo.com">
                            tuyenht90@yahoo.com                     </span></td>
                    <td>
                        01686039488 </td>
                    <td>
                        111111 </td>
                    <td class="option">
                        <a href="user/edit/16.html" class="tipS " original-title="Chỉnh sửa">
                            <img src="<?php echo public_url('admin/images/icons/color/edit.png'); ?>">
                        </a>
                        <a href="user/del/16.html" class="tipS verify_action" original-title="Xóa">
                            <img src="<?php echo public_url('admin/images/icons/color/delete.png'); ?>">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
</div>

<div class="clear mt30"></div>



