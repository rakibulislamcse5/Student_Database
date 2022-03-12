<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            <div class="menu-header">Dashboard</div>

            <div class="menu-item has-sub">
                <a href="/" class="menu-link">
                    <span class="menu-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span class="menu-text">All Student</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ url('Dashboard/AddStudent') }}" class="menu-link">
                            <span class="menu-text">Add Students</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ url('/Dashboard/AllDeletedStudent') }}" class="menu-link">
                            <span class="menu-text">All Deleted Students</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ url('Dashboard/AllTeacher') }}" class="menu-link">
                            <span class="menu-text">All Teachers</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ url('Dashboard/AddTeacher') }}" class="menu-link">
                            <span class="menu-text">Add Teacher</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ url('Dashboard/AllDeletedTeacher') }}" class="menu-link">
                            <span class="menu-text">All Delete Teachers</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub">
                <a href="{{ url('Dashboard/AddTrade') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span class="menu-text">Add Trade</span>
                    <span class="menu-caret"></span>
                </a>
            </div>

            <div class="menu-item has-sub">
                <a href="{{ url('Dashboard/AllDeletedTrade') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <span class="menu-text">All Deleted Trade</span>
                    <span class="menu-caret"></span>
                </a>
            </div>

            @foreach ($trade as $key => $item)
                <div class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-caret-right"></i>
                        </span>
                        <span class="menu-text">{{ $item->trade_name; }}</span>
                        <span class="menu-caret"><b class="caret"></b></span>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="{{ url('Dashboard/StudentByTrade') }}/{{ $item->id; }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fas fa-id-card"></i>
                                </span>
                                <span class="menu-text">All Students</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="{{ url('Dashboard/DeletedStudentByTrade') }}/{{ $item->id; }}" class="menu-link">
                                <span class="menu-icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="menu-text">All Deleted Students</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>