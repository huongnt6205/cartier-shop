    <?php

    require_once __DIR__ . '/../config/base_query.php';

    const USERS_TABLE = 'users';

    /**
     * Lấy tổng số người dùng theo user_type (mặc định 'user')
     */
    function getUserCount($userType = 'user')
    {
        $conn = connectDatabase();
        $sql = "SELECT COUNT(*) as count FROM " . USERS_TABLE . " WHERE user_type = :user_type";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':user_type', $userType);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'] ?? 0;
        } catch (PDOException $e) {
            error_log("Error in getUserCount: " . $e->getMessage());
            return 0;
        } finally {
            $conn = null;
        }
    }

    /**
     * Lấy danh sách tất cả người dùng, có thể truyền tham số sắp xếp, phân trang
     * $orderBy: ví dụ 'name ASC'
     * $limit, $offset: số lượng và vị trí bắt đầu lấy dữ liệu
     */
    function getAllUsers($orderBy = null, $limit = null, $offset = null)
    {
        return findAll(USERS_TABLE, $orderBy, $limit, $offset);
    }

    /**
     * Lấy chi tiết người dùng theo ID
     */
    function getUserById($id)
    {
        $result = findBy(USERS_TABLE, ['id' => $id]);
        return $result[0] ?? null;
    }


    function getUsersByType($userType)
    {
        return findBy('users', ['user_type' => $userType]);
    }

    /**
     * Cập nhật thông tin người dùng
     */
    function updateUser($id, $name, $email)
    {
        $conn = connectDatabase();
        $sql = "UPDATE " . USERS_TABLE . " SET name = :name, email = :email WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':id' => $id,
            ]);
        } catch (PDOException $e) {
            error_log("Error in updateUser: " . $e->getMessage());
            return false;
        } finally {
            $conn = null;
        }
    }

    /**
     * Xóa người dùng theo ID
     */
    function deleteUserById($id)
    {
        $conn = connectDatabase();
        $sql = "DELETE FROM " . USERS_TABLE . " WHERE id = :id";
        try {
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error in deleteUserById: " . $e->getMessage());
            return false;
        } finally {
            $conn = null;
        }
    }

/**
 * Lấy người dùng theo email
 * @param string $email
 * @return array|null Mảng dữ liệu user hoặc null nếu không tìm thấy
 */
function getUserByEmail($email)
{
    $conn = connectDatabase();
    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    } catch (PDOException $e) {
        error_log("Error in getUserByEmail: " . $e->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

/**
 * Thêm người dùng mới
 * @param array $user Dữ liệu người dùng ['name' => ..., 'email' => ..., 'password' => ..., 'user_type' => ...]
 * @return bool Trả về true nếu thêm thành công, false nếu thất bại
 */
function addUser(array $user)
{
    $conn = connectDatabase();
    $sql = "INSERT INTO users (name, email, password, user_type) VALUES (:name, :email, :password, :user_type)";
    try {
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ':name' => $user['name'],
            ':email' => $user['email'],
            ':password' => $user['password'],
            ':user_type' => $user['user_type'],
        ]);
    } catch (PDOException $e) {
        error_log("Error in addUser: " . $e->getMessage());
        return false;
    } finally {
        $conn = null;
    }
}
