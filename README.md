# TSP Server Project

โปรเจ็ค TSP Server ที่รันด้วย Docker

## ความต้องการของระบบ

- Docker
- Docker Compose

## วิธีการติดตั้งและรัน

### 1. Clone โปรเจ็ค
```bash
git clone <repository-url>
cd tsp@server
```

### 2. รันด้วย Docker Compose
```bash
docker-compose up -d
```

### 3. เข้าถึงแอปพลิเคชัน
- **เว็บแอปพลิเคชัน**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
  - Username: `tspapp`
  - Password: `db@pptsp`

### 4. หยุดการทำงาน
```bash
docker-compose down
```

## การตั้งค่าฐานข้อมูล

ฐานข้อมูลจะถูกสร้างอัตโนมัติเมื่อรันครั้งแรก โดยใช้ไฟล์ `sql_tsp/db_tsp.sql`

### ข้อมูลการเชื่อมต่อฐานข้อมูล
- **Host**: `db` (ภายใน Docker network)
- **Database**: `tsp`
- **Username**: `tspapp`
- **Password**: `db@pptsp`

## การพัฒนา

ไฟล์ในโปรเจ็คจะถูก mount เข้า container ดังนั้นการแก้ไขไฟล์จะส่งผลทันทีโดยไม่ต้อง rebuild image

### การ rebuild image
```bash
docker-compose build
docker-compose up -d
```

### การดู logs
```bash
docker-compose logs -f web
docker-compose logs -f db
```

## โครงสร้างโปรเจ็ค

- `index.php` - หน้าหลัก
- `login.php` - หน้าเข้าสู่ระบบ
- `mysql_connect.php` - การเชื่อมต่อฐานข้อมูล
- `sql_tsp/db_tsp.sql` - ไฟล์ SQL สำหรับสร้างฐานข้อมูล

## การแก้ไขปัญหา

### หากไม่สามารถเชื่อมต่อฐานข้อมูลได้
1. ตรวจสอบว่า MySQL container ทำงานอยู่
2. รอให้ MySQL เริ่มต้นเสร็จ (อาจใช้เวลาสักครู่)
3. ตรวจสอบ logs: `docker-compose logs db`

### หากหน้าเว็บไม่แสดงผล
1. ตรวจสอบว่า Apache container ทำงานอยู่
2. ตรวจสอบ logs: `docker-compose logs web`
3. ตรวจสอบ port 8080 ไม่ถูกใช้งานโดยโปรแกรมอื่น 