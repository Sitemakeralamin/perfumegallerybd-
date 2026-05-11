<aside class="main-sidebar sidebar-dark-primary elevation-4">

  {{-- Brand Logo --}}
  <div class="sidebar-glass-brand">
    <div class="sg-icon">
      <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <polyline points="9 22 9 12 15 12 15 22" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
    <div>
      <div class="sg-name">{{ env('APP_NAME') }}</div>
      <div class="sg-sub">Admin Panel</div>
    </div>
  </div>

  <div class="sidebar-flex-wrap">
    {{-- Scrollable Nav --}}
    <div class="sidebar-nav-scroll">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          @if(Auth::user()->type == 1)

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings & Others <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Shop Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('about_us.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>About us Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('setting.reward.point') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Reward Point Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Slider Option</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider_side_banner.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Slider Side Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('f.banner.show') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Pages</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>User Management <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Adminstrators</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('customer.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Customers</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Product <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Products List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.stock') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Product Stock List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('color.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Colors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('variation.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Variation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('flash.sale.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Flash Sale</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            @php
              $pending_orders = DB::table('orders')->where('order_status','pending')->count();
            @endphp
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>Orders <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>All Orders</p>
                </a>
              </li>
              @php
                $wholesale_count = DB::table('wholesales')->count('id');
                $order_status = DB::table('orders')->select('order_status', DB::raw('count(*) as total'))->groupBy('order_status')->get();
              @endphp
              <li class="nav-item d-none">
                <a href="{{ route('wholesale.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i>
                  <p>Wholesale <span class="badge badge-light ms-1">{{$wholesale_count}}</span></p>
                </a>
              </li>
              @foreach($order_status as $status)
                @php $count = DB::table('orders')->where('order_status', $status->order_status)->count(); @endphp
                <li class="nav-item">
                  <a href="{{ route('order.status.filter', $status->order_status) }}" class="nav-link">
                    <i class="fas fa-angle-right"></i>
                    <p>{{ $status->order_status }} <span class="badge badge-light ms-1">{{$count}}</span></p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>

          @php( $review_count = DB::table('products_reviews')->where(['is_active'=>0])->count('id') )
          <li class="nav-item">
            <a href="{{ route('product.review.index') }}" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>Product Reviews</p>
              @if($review_count > 0)
                <span class="bg-primary px-2 p-1 rounded-pill text-light" style="font-size:10px;">{{$review_count}}</span>
              @endif
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('image.upload.index') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>Image Upload</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-percent"></i>
              <p>Campaign <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('coupon.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Coupons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('registration.point.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Registration Point</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.subscribers') }}" class="nav-link">
              <i class="nav-icon fas fa-bell-slash"></i>
              <p>Subscribers</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>Location <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('district.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>District List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('area.index') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Area List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-blog"></i>
              <p>Blog <i class="fas fa-angle-right right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blog.create') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Create Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('blog.list') }}" class="nav-link">
                  <i class="fas fa-angle-right"></i><p>Blog List</p>
                </a>
              </li>
            </ul>
          </li>

          @endif

          @if(Auth::user()->type == 2)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i><p>My Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-heart"></i><p>My Wishlist</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('customer.dashboard.wallet') }}" class="nav-link">
              <i class="nav-icon fas fa-money-bill-alt"></i><p>My Wallet</p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
    </div>

    {{-- User Profile at Bottom --}}
    <div class="sidebar-user-bottom">
      <img src="{{ asset('images/user-avatar-icon.jpg') }}" class="sub-avatar" alt="User">
      <div style="overflow:hidden;">
        <div class="sub-name">{{ Auth::user()->name }}</div>
        <div class="sub-role">{{ Auth::user()->type == 1 ? 'Administrator' : 'Customer' }}</div>
      </div>
      <a href="{{ route('user.profile') }}" style="margin-left:auto; color:rgba(255,255,255,0.4); flex-shrink:0;" title="Profile">
        <i class="fas fa-cog fa-sm"></i>
      </a>
    </div>
  </div>

</aside>
