<?php
// index.php
include 'db.php'; // Connect to DB

// ✅ Pagination setup
$limit = 20; // show max 20 blogs per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// ✅ Fetch blogs with LIMIT + OFFSET
$query = "SELECT * FROM approved_blogs ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($query);
$blogs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
}

// ✅ Count total blogs for pagination
$countResult = $conn->query("SELECT COUNT(*) AS total FROM approved_blogs");
$totalBlogs = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalBlogs / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Homepage</title>
<link rel="stylesheet" href="index_style.css">
<style>
/* Blog cards layout */
.cards {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 170px;
    padding: 20px;
}
.card {
    position: relative;
    background: #e1f1faff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
}
.card h3 { color: #0047a3; margin-bottom: 5px; cursor: pointer; }
.card p { font-size: 14px; margin: 0; }
.card button { margin-top: 10px; padding: 6px 10px; border: none; border-radius: 5px; cursor: pointer; background: #4e54c8; color: white; }
.card button:hover { background: #3b3fc0; }

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 2000;
}
.modal-content {
    background: #fff;
    width: 70%;
    max-height: 80%;
    overflow-y: auto;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
    animation: fadeIn 0.3s ease;
}
.modal-content h3 { color: #0047a3; margin-bottom: 10px; }
.modal-content p { font-size: 14px; }
.modal-close {
    background: red;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    float: right;
    cursor: pointer;
}
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}
.blog-media { max-width: 100%; margin-top: 10px; border-radius: 6px; }
pre code { display: block; padding: 10px; background: #f0f0f0; border-radius: 6px; overflow-x: auto; font-size: 13px; margin-top: 10px; }

/* Pagination */
.pagination {
    text-align: center;
    margin: 30px 0;
}
.pagination a {
    display: inline-block;
    margin: 0 5px;
    padding: 8px 12px;
    background: #4e54c8;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}
.pagination a:hover {
    background: #3b3fc0;
}
.pagination .active {
    background: #28a745;
}

/* Like / Dislike */
.like-dislike {
    margin-top: 20px;
    display: flex;
    gap: 15px;
    align-items: center;
}
.like-btn, .dislike-btn {
    padding: 8px 14px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}
.like-btn { background: #28a745; color: white; }
.like-btn:hover { background: #218838; }
.dislike-btn { background: #dc3545; color: white; }
.dislike-btn:hover { background: #c82333; }

/* View count (top-right corner of card) */
.view-count {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 18px;
    color: #222;
    font-weight: bold;
}

/* Responsive */
@media screen and (max-width: 992px) { .cards { grid-template-columns: 1fr 1fr; } }
@media screen and (max-width: 600px) { .cards { grid-template-columns: 1fr; } }
</style>
</head>
<body>

<header>
    <div class="logo-left"><img src="Image/abc.png" alt="Left Logo"></div>
    <div class="title">
        <h1>ARUL ANANDAR COLLEGE</h1>
        <p>COMPUTER SCIENCE & APPLICATIONS</p>
    </div>
    <div class="logo-right"><img src="Image/cm.png" alt="Right Logo"></div>
</header>

<div class="log"><a href="login.php"><button type="button"> LOGIN </button></a></div>
<div class="about"><a href="aboutusnew.html"><button type="button"> ABOUT </button></a></div>

<div class="img1">
    <h1>BLOG</h1>
    <p>Study Smarter, Share Freely and Support others in their Journey to Success</p>
</div>

<div class="cards">
<?php if(count($blogs) > 0): ?>
    <?php foreach($blogs as $blog): ?>
    <div class="card">
        <span class="view-count">👁 <?= $blog['views'] ?? 0 ?></span>

        <h3><?= htmlspecialchars($blog['heading']) ?></h3>
        <p><strong>By:</strong> <?= htmlspecialchars($blog['author']) ?></p>
        <button onclick="openModal('<?= $blog['id'] ?>')">Read More</button>

        <div id="blog-<?= $blog['id'] ?>" style="display:none;">
            <h3><?= htmlspecialchars($blog['heading']) ?></h3>
            <p><strong>By:</strong> <?= htmlspecialchars($blog['author']) ?></p>

            <?php
            // ✅ Fix: use correct /test/uploads/image path
            if(!empty($blog['img1'])){
                $imgFile = basename($blog['img1']);
                $imgPath = "/test/uploads/image/".$imgFile;
                echo '<img src="'.$imgPath.'" class="blog-media">';
            }

            $fixedContent = str_replace(["\\r\\n","\\r","\\n"], "\n", $blog['content']);
            $parts = preg_split('/```/', $fixedContent);
            $isCode = false;
            foreach($parts as $part){
                if($isCode){
                    echo '<pre><code>'.htmlspecialchars(trim($part)).'</code></pre>';
                } else {
                    echo '<p>'.nl2br(strip_tags(trim($part), '<b><i><u><strong><em><br>')).'</p>';
                }
                $isCode = !$isCode;
            }

            if(!empty($blog['video'])){
                echo '<video controls class="blog-media"><source src="'.$blog['video'].'"></video>';
            }
            if(!empty($blog['audio'])){
                echo '<audio controls class="blog-media"><source src="'.$blog['audio'].'"></audio>';
            }
            if(!empty($blog['code'])){
                $codePath = $blog['code'];
                if(file_exists($codePath)){
                    $codeContent = file_get_contents($codePath);
                    echo '<pre><code>'.htmlspecialchars($codeContent).'</code></pre>';
                }
            }
            ?>

            <div class="like-dislike">
                <button class="like-btn" onclick="likeBlog(<?= $blog['id'] ?>)">👍 Like <span id="like-count-<?= $blog['id'] ?>"><?= $blog['likes'] ?? 0 ?></span></button>
                <button class="dislike-btn" onclick="dislikeBlog(<?= $blog['id'] ?>)">👎 Dislike <span id="dislike-count-<?= $blog['id'] ?>"><?= $blog['dislikes'] ?? 0 ?></span></button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No blogs published yet.</p>
<?php endif; ?>
</div>

<div class="pagination">
    <?php if($page > 1): ?>
        <a href="?page=<?= $page-1 ?>">&laquo; Prev</a>
    <?php endif; ?>

    <?php for($i=1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if($page < $totalPages): ?>
        <a href="?page=<?= $page+1 ?>">Next &raquo;</a>
    <?php endif; ?>
</div>

<div class="modal" id="blogModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">X</button>
        <div id="modal-body"></div>
    </div>
</div>

<script>
function openModal(id){
    let content = document.getElementById("blog-"+id).innerHTML;
    document.getElementById("modal-body").innerHTML = content;
    document.getElementById("blogModal").style.display = "flex";

    fetch("update_views.php?id=" + id)
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            let span = document.querySelector("#view-count-" + id);
            if (span) span.textContent = "👁 " + data.views;
        }
    });
}
function closeModal(){
    document.getElementById("blogModal").style.display = "none";
}
window.onclick = function(e){
    let modal = document.getElementById("blogModal");
    if(e.target == modal){ modal.style.display = "none"; }
}

function likeBlog(id){
    fetch("update_likes.php?type=like&id="+id)
        .then(res => res.text())
        .then(data => {
            document.getElementById("like-count-"+id).textContent = data;
        });
}
function dislikeBlog(id){
    fetch("update_likes.php?type=dislike&id="+id)
        .then(res => res.text())
        .then(data => {
            document.getElementById("dislike-count-"+id).textContent = data;
        });
}
</script>

</body>
</html>
