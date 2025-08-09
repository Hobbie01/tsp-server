# การ Refactor ไฟล์ Showall

## สิ่งที่เปลี่ยนแปลง

ไฟล์ `showall*.php` ทั้งหมดได้ถูก refactor เป็นระบบเดียวเพื่อลดความซ้ำซ้อนและง่ายต่อการบำรุงรักษา

### ไฟล์เดิม (ก่อน refactor)
- `showall.php` - การติดเชื้อในระบบทางเดินปัสสาวะ (table1)
- `showallb.php` - การติดเชื้อในกระแสโลหิต (tableb1)
- `showallc.php` - ภาวะปอดอักเสบ (tablec1)
- `showalld.php` - การติดเชื้อที่ตำแหน่งผ่าตัด (tabled1)
- `showalle.php` - การติดเชื้อตำแหน่งอื่นๆ (tablee1)
- `showallf.php` - ยอดยกมา (tablef)

### ไฟล์ใหม่ (หลัง refactor)
- `showall_unified.php` - ไฟล์หลักที่รองรับทุกประเภท
- `showall*.php` - ไฟล์ redirect ที่ส่งต่อไปยัง unified version

## วิธีการใช้งาน

### การเข้าถึงแต่ละประเภท

#### วิธีเดิม (ยังใช้งานได้)
```
showall.php   -> Type A (ระบบทางเดินปัสสาวะ)
showallb.php  -> Type B (กระแสโลหิต)
showallc.php  -> Type C (ปอดอักเสบ)
showalld.php  -> Type D (ตำแหน่งผ่าตัด)
showalle.php  -> Type E (ตำแหน่งอื่นๆ)
showallf.php  -> Type F (ยอดยกมา)
```

#### วิธีใหม่ (Direct access)
```
showall_unified.php?type=a  -> Type A
showall_unified.php?type=b  -> Type B
showall_unified.php?type=c  -> Type C
showall_unified.php?type=d  -> Type D
showall_unified.php?type=e  -> Type E
showall_unified.php?type=f  -> Type F
```

## ข้อดีของการ Refactor

1. **ลดความซ้ำซ้อน**: โค้ดที่เหมือนกันถูกรวมเป็นไฟล์เดียว
2. **ง่ายต่อการบำรุงรักษา**: แก้ไขที่เดียวได้ผลทุกประเภท
3. **Backward Compatible**: ลิงก์เดิมยังใช้งานได้ปกติ
4. **Flexible**: สามารถเพิ่มประเภทใหม่ได้ง่าย
5. **UI Consistency**: ปุ่มเครื่องมือแสดงเหมือนกันทุกประเภท (แก้ไข, ลบ)

## การทำงานของไฟล์ Unified

ไฟล์ `showall_unified.php` ใช้ parameter `type` เพื่อกำหนดประเภทข้อมูลที่จะแสดง:

```php
$config = [
    'a' => [
        'title' => 'การติดเชื้อในระบบทางเดินปัสสาวะทั้งหมด',
        'table' => 'table1',
        'id_field' => 'table1_id',
        'add_form' => 'form1.php',
        'edit_form' => 'edit_form1.php',
        'search_form' => 'search_hn.php'
    ],
    // ... configurations อื่นๆ
];
```

## UI Changes

### ปุ่มเครื่องมือ:

#### สำหรับ Type A-E (ข้อมูลผู้ป่วย):
- 📋 **ทบทวน** - สำหรับทบทวนข้อมูล (ไปยังฟอร์มทบทวนของแต่ละประเภท)
- 🔧 **แก้ไข** - สำหรับแก้ไขข้อมูล  
- 🗑️ **ลบ** - สำหรับลบข้อมูล

#### สำหรับ Type F (ยอดยกมา):
- 🗑️ **ลบ** - เฉพาะปุ่มลบเท่านั้น (ไม่มีการทบทวนหรือแก้ไข)

### การทำงานของปุ่มทบทวน (Type A-E เท่านั้น):
- **Type A**: ไปยัง `form2.php` (ทบทวนปัจจัยการติดเชื้อปัสสาวะ)
- **Type B**: ไปยัง `formb2.php` (ทบทวนการติดเชื้อกระแสโลหิต)
- **Type C**: ไปยัง `formc2.php` (ทบทวนปอดอักเสบ)
- **Type D**: ไปยัง `formd2.php` (ทบทวนการติดเชื้อผ่าตัด)
- **Type E**: ไปยัง `forme2.php` (ทบทวนการติดเชื้อตำแหน่งอื่นๆ)

## การเพิ่มประเภทใหม่

หากต้องการเพิ่มประเภทใหม่ (เช่น type 'g'):

1. เพิ่ม configuration ใน array `$config`
2. สร้างไฟล์ `showallg.php` ที่ redirect ไปยัง `showall_unified.php?type=g`

## ข้อมูลเทคนิค

- **Backward Compatibility**: ✅ ใช่
- **Performance**: ✅ ดีขึ้น (ลด code duplication)
- **Maintainability**: ✅ ดีขึ้นมาก
- **Scalability**: ✅ เพิ่มประเภทใหม่ได้ง่าย

วันที่สร้าง: <?= date('Y-m-d H:i:s') ?>
