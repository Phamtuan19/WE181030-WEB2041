const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

/*
  SliderShow
*/
let currIndex = 0;

const arrayList = [
	'https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/12/15/638066662143788648_F-C1_1200x300.png',
	'https://images.fpt.shop/unsafe/fit-in/1190x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/12/28/638078677814214348_F-H6_1190x300.jpg',
	'https://images.fpt.shop/unsafe/fit-in/1190x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/12/29/638079498459281965_H6%20-%201190x300.png',
];

$('.sliderShow_img').src = arrayList[currIndex];

function next() {
	currIndex === arrayList.length - 1 ? (currIndex = 0) : currIndex++;
	$('.sliderShow_img').src = arrayList[currIndex];
}

function prev() {
	currIndex === 0 ? (currIndex = arrayList.length - 1) : currIndex--;
	$('.sliderShow_img').src = arrayList[currIndex];
}

setInterval(function () {
	next();
}, 3000);

/*
  Menu Categories
*/

const cateArr = [
	'Điện thoại',
	'Máy tính bảng',
	'Laptop',
	'PC - Màn hình',
	'Âm Thanh',
	'Đồng hồ',
	'Hàng cũ',
	'khuyến mãi',
	'Phụ kiện',
];

const navC2Render = cateArr.map((e) => {
	return `
	<div class="nav-item cate-link nav-c2_item">
		<a class="nav-link nav-c2_link">${e}</a>
	</div>
	`
})

$('.nav-c2_box').innerHTML = navC2Render.join('');


const cateRender = cateArr.map((item) => {
	return `
    <div class="cate-content">
      <div class="cate-item" style="background-color: white;">
        <a href="#" class="cate-link nav-link d-flex px-3 py-2 align-items-center justify-content-between">
          <p class="mb-0">${item}</p>
          <i class="fa-solid fa-chevron-right"></i>
        </a>
      </div>
    </div>
  `;
});

// $('.cate_menu').innerHTML = cateRender.join('');

/*
  support and incentives
*/

const supportArr = [
	{
		url: 'https://file.hstatic.net/1000191021/file/6-icon-shipper_a9bf93829efb4de4865f698fb443338e_grande.png',
		p: 'Miễn phí vận chuyển',
		span: 'Tới tận tay khách hàng',
	},
	{
		url: 'https://beetico.com/wp-content/uploads/2020/05/icon-h%E1%BB%97-tr%E1%BB%A3-kh%C3%A1ch-h%C3%A0ng.png',
		p: 'Tư vấn khách hàng',
		span: '0371894323',
	},
	{
		url: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyqhO21LzEepPOCxgIa6Sn81cj4v4E71cHsQ&usqp=CAU',
		p: 'Tiết kiệm hơn',
		span: 'Với nhiều ưu đãi cự lớn',
	},
	{
		url: 'https://hoaphatsaigon.net/library/uploadfile/images/icon%20thanh%20toan.png',
		p: 'Thanh toán nhanh',
		span: 'Với nhiều hình thức thanh toán',
	},
	{
		url: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8UEt_xy-Q3sJeIwP9N77yb-fD5BVIxOjFhw&usqp=CAU',
		p: 'Đổi trả nhanh chóng',
		span: 'Với nhiều chính sách',
	},
	{
		url: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8s3qJGrIY6cLV_0ljsiyvZUvsrokrMaB80g&usqp=CAU',
		p: 'Đặt hàng Online',
		span: 'Với thao tác dễ dàng',
	},
];

const supportRender = supportArr.map((item) => {
	return `
    <div class="col-2 support-item">
      <div class="py-4 rounded-1" style="background-color: #fff; margin: 0 5px;">
		<a href="" class="nav-link">
			<div class="d-flex justify-content-center">
				<img src="${item.url}" alt="" style="width: 50px">
			</div>
			<div class="d-flex align-items-center flex-column mt-2 gap-1">
				<p class="mb-0" style="font-size: 16px;">${item.p}</p>
				<span style="font-size: 12px; font-weight: 300;">${item.span}</span>
			</div>
		</a>
      </div>
    </div>
  `;
});

$('.support').innerHTML = supportRender.join('\n');

