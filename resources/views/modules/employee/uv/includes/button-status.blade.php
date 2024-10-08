@if ($item->employeeCv && $item->employeeCv->is_read == 0)
    <a class="btn-view-profile" href="{{ route('employee.cv.showCv', $item->cv->id) }}">
        <i class="fas fa-eye"></i> Xem hồ sơ
    </a>
@else
    @if ($item->employeeCv && $item->employeeCv->status == 1)
        <a class="kq" href="{{ route('employee.cv.showCv', $item->cv->id) }}">
            <i class="fas fa-envelope"></i> Chưa phù hợp
        </a>
    @elseif ($item->employeeCv && $item->employeeCv->status == 2)
        <div class="btn-view">
            <a href="{{ route('employee.cv.showCv', $item->cv->id) }}" class="viewed-btn" title="Chi tiết"
                data-toggle="tooltip">
                <i class="fas fa-info-circle"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'hire']) }}"
                class="viewed-btn mr-2" title="Phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-check"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'reject']) }}"
                class="viewed-btn mr-2" title="Chưa phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-times"></i>
            </a>

        </div>
    @elseif ($item->employeeCv && $item->employeeCv->status === '0')
        <div class="btn-view">
            <a href="{{ route('employee.cv.showCv', $item->cv->id) }}" class="viewed-btn" title="Chi tiết"
                data-toggle="tooltip">
                <i class="fas fa-info-circle"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'hire']) }}"
                class="viewed-btn mr-2" title="Phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-check"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'reject']) }}"
                class="viewed-btn mr-2" title="Chưa phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-times"></i>
            </a>

        </div>
    @else
        <div class="btn-view">
            <a href="{{ route('employee.cv.showCv', $item->cv->id) }}"
                class="viewed-btn" title="Đã xem" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'hire']) }}"
                class="viewed-btn mr-2" title="Phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-check"></i>
            </a>
            <a href="{{ route('employee.cv.handleAction', ['id' => $item->cv->id, 'action' => 'reject']) }}"
                class="viewed-btn mr-2" title="Chưa phù hợp" data-toggle="tooltip" data-placement="top">
                <i class="fas fa-times"></i>
            </a>

        </div>
    @endif
@endif