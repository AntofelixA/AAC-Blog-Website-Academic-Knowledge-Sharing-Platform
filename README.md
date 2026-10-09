# AAC Blog Website – Academic Knowledge Sharing Platform

A dynamic, full-stack Departmental Blog & Q&A Platform designed to bridge the communication gap between senior and junior students while providing a structured environment for academic knowledge sharing. 

This platform allows students from **MCA, BCA, and BSc.CS** to stay informed about department happenings, read senior insights, ask questions, and engage through an interactive comment section. To maintain a safe and encouraging environment, the system utilizes a **Dual-Admin validation workflow** split between faculty and student coordinators.

---

## 🚀 Key Features

### 👥 Dual-Admin Governance & Content Moderation
* **Dual-Role Administration:** Co-managed by one Professor-side Admin and one Student-side Admin to oversee quality control.
* **Verification Workflow:** Bloggers (students/faculty) can write and edit posts in a specialized UI/UX editor, but posts only go live after Admin verification to filter out copyright issues or inappropriate text.
* **Comment Control:** An automated and manual moderation system to block vulgar comments, ensuring a safe academic space.

### ✍️ Rich Content Creation & Interaction
* **Advanced Visual Editor:** Enhanced UI/UX writing interface that allows rich text and seamless multimedia integration (images, links, formatted content).
* **Inter-Academic Mentorship:** Dedicated Q&A and blog space focusing on helping newbie juniors adapt to college life with guidance from seniors.
* **Emoji-Enabled Comments:** Interactive comment sections supporting emojis to encourage organic, friendly student discussions.
* **Smart Categorization:** Easily filter articles related to education, technology, campus events, research, and student achievements.

### 🛡️ Security & Performance
* **Role-Based Access Control (RBAC):** Secure authentication system managing explicit permissions for Students, Faculty, and Admins.
* **Fully Responsive Design:** A mobile-friendly frontend layout optimized for desktops, tablets, and smartphones.

---

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
* **Backend:** PHP (Object-Oriented / Procedural logic)
* **Database:** MySQL
* **Version Control:** Git & GitHub

---

## 👥 The Team & Collaboration

This project was successfully engineered and deployed by a dedicated team of **8 MCA classmates** in close collaboration with department faculty. 

* **Student Developers:** 8 MCA Classmates (Managed code integration, database architecture, and UI design using **Git/GitHub** for seamless version control).
* **Faculty Advisors:** Connected Assistant Professors who served as core teammates to guide feature requirements and encourage student learning.

> 🎉 **Impact Note:** Following its successful launch at the department level, the platform received widespread institutional recognition. It is currently being scaled up as the **AAC Blog System** to support all students and faculty across the entire college ecosystem!

---

## 🔧 Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com
   cd aac-blog-system
   ```

2. **Database Configuration:**
   * Import the provided `.sql` file (found in the `/database` folder) into your local MySQL server (e.g., via phpMyAdmin).
   * Update your database connection credentials in `config.php` or `connect.php`:
     ```php
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'your_root');
     define('DB_PASSWORD', 'your_password');
     define('DB_NAME', 'aac_blog_db');
     ```

3. **Run Locally:**
   * Move the project folder to your local server directory (e.g., `htdocs` for XAMPP or `www` for WampServer).
   * Open your browser and navigate to `http://localhost/aac-blog-system`.

---

## 💡 Future Scope
* Scaling the infrastructure to handle college-wide user traffic.
* Implementing live real-time notifications for post approvals and comment replies.
* Adding an AI-based text filter to pre-screen comments before manual admin review.
