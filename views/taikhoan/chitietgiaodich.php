<div class="myaccount-content">
    <h2>Chi tiết giao dịch</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['user_id']) && !empty($chitietgiaodich)) : ?>
                <tr>
                    <td><?= $chitietgiaodich['username'] ?></td>
                    <td><?= $chitietgiaodich['password'] ?></td>
                </tr>
            <?php elseif (isset($_SESSION['user_id']) && empty($chitietgiaodich)) : ?>
                <tr>
                    <td colspan="2">Không có chi tiết giao dịch nào.</td>
                </tr>
            <?php else : ?>
                <tr>
                    <td colspan="2">Bạn chưa đăng nhập.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
