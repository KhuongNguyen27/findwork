<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\app\Models\EmployeeCv;
use Modules\Employee\app\Models\UserJobApply;

class NotificationController extends Controller
{


    public function getNotification()
    {
        // Số lượng thông báo hiện tại trong bảng
        $notifications = Notification::where('user_id', Auth::id())->latest()->take(10)->get();
        // dd($notifications);
        $data = [];
        // Đếm số lượng thông báo chưa đọc
        $unreadCount = Notification::where('user_id', Auth::id())
            ->where('is_read', 0)
            ->count();
        foreach ($notifications as $notification) {

            // Lấy tên công việc nếu có liên kết
            $jobName = $notification->job ? $notification->job->name : 'Công việc không xác định';

            // Xử lý tin nhắn
            $actionMessage = '';
            $title = '';
            $icon = '';
            $url = '#';
            switch ($notification->action) {
                case 'approved':
                    $actionMessage = "Tin đăng <strong>$jobName</strong> của bạn đã được duyệt.";
                    $title = 'Công việc được duyệt';
                    $icon = 'check_circle';
                    $color = '#28a745';
                    $url = route('employee.job.index');
                    break;

                case 'rejected':
                    $actionMessage = "Tin đăng <strong>$jobName</strong> của bạn đã bị từ chối";
                    $title = 'Công việc bị từ chối';
                    $icon = 'cancel';
                    $color = '#dc3545';
                    $url = route('employee.job.index');
                    break;

                case 'applied':
                    // Lấy thông tin từ bảng UserJobApply
                    $cvApply = UserJobApply::find($notification->item_id);
                    $applicantName = $cvApply ? $cvApply->user->name : 'Người nộp đơn không xác định';
                    $jobName = $cvApply ? $cvApply->job->name : 'Công việc không xác định';
                    $jobId = $cvApply ? $cvApply->job->id : null;

                    $actionMessage = "<strong>$applicantName</strong> đã nộp đơn vào công việc <strong>$jobName</strong>";
                    $title = 'Ứng viên nộp đơn';
                    $icon = 'person_add';
                    $color = '#17a2b8';
                    $url = $jobId ? route('employee.applied', ['id' => $jobId]) : '#';
                    break;


                case 'viewed':
                    $employeeCv = EmployeeCv::where('cv_id', $notification->item_id)->first();
                    $recruiterName = $employeeCv ? $employeeCv->user->name : 'Nhà tuyển dụng không xác định';
                    $actionMessage = "nhà tuyển dụng <strong>$recruiterName</strong> đã xem hồ sơ của bạn.";
                    $title = 'NTD đã xem hồ sơ';
                    $icon = 'visibility';
                    $color = '#ffc107';
                    $url = route('staff.cv.index');
                    break;
                case 'hire':
                    $employeeCv = EmployeeCv::where('cv_id', $notification->item_id)->first();
                    $recruiterName = $employeeCv ? $employeeCv->user->name : 'Nhà tuyển dụng không xác định';

                    $actionMessage = "nhà tuyển dụng <strong>$recruiterName</strong> đã đánh giá hồ sơ của bạn là <strong>Phù hợp</strong>.";
                    $title = 'Phù hợp';
                    $icon = 'check_circle';
                    $color = '#28a745';
                    $url = route('staff.job-applied');

                    break;
                case 'reject':
                    $employeeCv = EmployeeCv::where('cv_id', $notification->item_id)->first();
                    $recruiterName = $employeeCv ? $employeeCv->user->name : 'Nhà tuyển dụng không xác định';

                    $actionMessage = "nhà tuyển dụng <strong>$recruiterName</strong> đã đánh giá hồ sơ của bạn là <strong>Chưa phù hợp</strong>.";
                    $title = 'Chưa phù hợp';
                    $icon = 'cancel';
                    $color = '#dc3545';
                    $url = route('staff.job-applied');
                    break;
                default:
                    $actionMessage = 'Thông báo mới';
                    $title = 'Thông báo';
                    $icon = 'notifications';
                    $color = '#007bff';
                    $url = '#';
                    break;
            }

            $data[] = [
                'message' => $actionMessage,
                'time' => $notification->created_at->diffForHumans(),
                'icon' => $icon,
                'color' => $color,
                'title' => $title,
                'url' => $url,
                'type' => $notification->type
            ];
            // dd($data);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
            'unreadCount' => $unreadCount,
            'count' => $notifications->count()
        ]);
    }


    public function markAllRead()
    {
        Notification::where('user_id', Auth::id())->update(['is_read' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Tất cả thông báo đã được đánh dấu là đã đọc.'
        ]);
    }


    // public function markAsRead(Request $request)
    // {
    //     // dd(123);
    //     $notification = Notification::find($request->notification_id);

    //     if (!$notification) {
    //         return response()->json(['success' => false, 'message' => 'Thông báo không tồn tại.']);
    //     }

    //     if ($notification->user_id != Auth::id()) {
    //         return response()->json(['success' => false, 'message' => 'Thông báo không thuộc về bạn.']);
    //     }

    //     $notification->is_read = true;
    //     if ($notification->save()) {
    //         return response()->json(['success' => true, 'message' => 'Thông báo đã được đánh dấu là đã đọc.']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Không thể cập nhật thông báo.']);
    //     }
    // }
}
