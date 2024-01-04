<?php

namespace Modules\Employee\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Employee\app\Models\Job;
use Illuminate\Support\Facades\DB;

class SeedTableJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            [
                'user_id' => 1,
                'name' => 'Nhân viên văn phòng',
                'slug' => 'cong-viec-so-1',
                'formwork_id' => 1,
                'deadline' => '2023-12-01',
                'start_day' => '2023-12-01',
                'experience' => 1,
                'wage_id' => 1,
                'gender' => 1,
                'rank_id' => 1,
                'jobpackage_id' => 1,
                'price' => 200000,
                'number_day' => 20,
                'work_address' => 'Hải Dương',
                'degree_id' => 1,
                'status' => 1,
                'end_day' => '2023-12-05',
                'start_hour' => 21,
                'end_hour' => 22,
                'description' => 'Soạn thảo văn bản bằng word và excel',
                'requirements' => 'Nam cao mét 8, nhanh nhẹn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Kỹ sư phần mềm',
                'slug' => 'cong-viec-so-2',
                'formwork_id' => 1,
                'deadline' => '2023-12-01',
                'start_day' => '2023-12-01',
                'experience' => 2,
                'wage_id' => 2,
                'gender' => 1,
                'rank_id' => 2,
                'jobpackage_id' => 2,
                'price' => 300000,
                'number_day' => 22,
                'work_address' => 'Hà Nội',
                'degree_id' => 2,
                'status' => 1,
                'end_day' => '2023-12-05',
                'start_hour' => 9,
                'end_hour' => 18,
                'description' => 'Phát triển phần mềm, kiểm thử và bảo trì',
                'requirements' => 'Có kinh nghiệm làm việc trong lĩnh vực phần mềm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Lập trình viên Java',
                'slug' => 'cong-viec-so-3',
                'formwork_id' => 2,
                'deadline' => '2023-12-10',
                'start_day' => '2023-12-15',
                'experience' => 3,
                'wage_id' => 3,
                'gender' => 1,
                'rank_id' => 3,
                'jobpackage_id' => 2,
                'price' => 250000,
                'number_day' => 25,
                'work_address' => 'Hồ Chí Minh',
                'degree_id' => 2,
                'status' => 1,
                'end_day' => '2023-12-20',
                'start_hour' => 8,
                'end_hour' => 17,
                'description' => 'Phát triển ứng dụng Java',
                'requirements' => 'Có kiến thức về lập trình Java',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Nhân viên kinh doanh',
                'slug' => 'cong-viec-so-4',
                'formwork_id' => 1,
                'deadline' => '2023-12-05',
                'start_day' => '2023-12-08',
                'experience' => 1,
                'wage_id' => 1,
                'gender' => 2,
                'rank_id' => 2,
                'jobpackage_id' => 1,
                'price' => 180000,
                'number_day' => 30,
                'work_address' => 'Đà Nẵng',
                'degree_id' => 1,
                'status' => 1,
                'end_day' => '2023-12-31',
                'start_hour' => 9,
                'end_hour' => 18,
                'description' => 'Tiếp thị và bán hàng',
                'requirements' => 'Nữ, có kỹ năng giao tiếp tốt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Nhân viên kế toán',
                'slug' => 'cong-viec-so-5',
                'formwork_id' => 1,
                'deadline' => '2023-12-15',
                'start_day' => '2023-12-20',
                'experience' => 2,
                'wage_id' => 2,
                'gender' => 1,
                'rank_id' => 2,
                'jobpackage_id' => 1,
                'price' => 220000,
                'number_day' => 28,
                'work_address' => 'Hải Phòng',
                'degree_id' => 2,
                'status' => 1,
                'end_day' => '2023-12-31',
                'start_hour' => 9,
                'end_hour' => 17,
                'description' => 'Quản lý kế toán và lập báo cáo tài chính',
                'requirements' => 'Có kiến thức về kế toán',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Nhân viên bán hàng',
                'slug' => 'cong-viec-so-6',
                'formwork_id' => 2,
                'deadline' => '2023-12-10',
                'start_day' => '2023-12-15',
                'experience' => 1,
                'wage_id' => 1,
                'gender' => 2,
                'rank_id' => 1,
                'jobpackage_id' => 1,
                'price' => 180000,
                'number_day' => 30,
                'work_address' => 'Hồ Chí Minh',
                'degree_id' => 1,
                'status' => 1,
                'end_day' => '2023-12-31',
                'start_hour' => 8,
                'end_hour' => 17,
                'description' => 'Tư vấn và bán sản phẩm',
                'requirements' => 'Nữ, có kỹ năng giao tiếp tốt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Chuyên viên marketing',
                'slug' => 'cong-viec-so-7',
                'formwork_id' => 1,
                'deadline' => '2023-12-20',
                'start_day' => '2023-12-25',
                'experience' => 3,
                'wage_id' => 3,
                'gender' => 1,
                'rank_id' => 3,
                'jobpackage_id' => 2,
                'price' => 300000,
                'number_day' => 26,
                'work_address' => 'Đà Nẵng',
                'degree_id' => 2,
                'status' => 1,
                'end_day' => '2024-01-20',
                'start_hour' => 9,
                'end_hour' => 18,
                'description' => 'Xây dựng chiến lược marketing và quảng cáo',
                'requirements' => 'Có kinh nghiệm trong lĩnh vực marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Lập trình viên',
                'slug' => 'cong-viec-so-9',
                'formwork_id' => 1,
                'deadline' => '2023-12-10',
                'start_day' => '2023-12-15',
                'experience' => 2,
                'wage_id' => 2,
                'gender' => 0,
                'rank_id' => 2,
                'jobpackage_id' => 1,
                'price' => 250000,
                'number_day' => 30,
                'work_address' => 'Hà Nội',
                'degree_id' => 2,
                'status' => 1,
                'end_day' => '2024-01-15',
                'start_hour' => 9,
                'end_hour' => 18,
                'description' => 'Phát triển và duy trì ứng dụng web',
                'requirements' => 'Có kiến thức về lập trình và kỹ năng làm việc nhóm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Nhân viên phục vụ',
                'slug' => 'cong-viec-so-10',
                'formwork_id' => 2,
                'deadline' => '2023-12-20',
                'start_day' => '2023-12-25',
                'experience' => 1,
                'wage_id' => 1,
                'gender' => 2,
                'rank_id' => 1,
                'jobpackage_id' => 1,
                'price' => 180000,
                'number_day' => 26,
                'work_address' => 'Hồ Chí Minh',
                'degree_id' => 1,
                'status' => 1,
                'end_day' => '2024-01-20',
                'start_hour' => 8,
                'end_hour' => 17,
                'description' => 'Phục vụ khách hàng và chuẩn bị món ăn',
                'requirements' => 'Nữ, có kỹ năng giao tiếp tốt và yêu thích công việc phục vụ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}