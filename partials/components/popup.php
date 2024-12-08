<div id="popup-overlay"
	 class="hidden fixed top-0 left-0 w-full h-full bg-black opacity-80 z-40">
</div>

<div class="hidden bg-white max-w-5xl left-0 right-0 z-50 fixed mx-auto"
	 id="popup-wrapper">
	<div class="max-w-5xl mx-auto grid grid-cols-12">
		<div class="col-span-12 lg:col-span-6 text-center relative">

			<div id="close-popup"
				 class="absolute right-9 top-9 cursor-pointer ">
				<svg class="icon size-6 rotate-45">
					<use href="#icon-plus" />
				</svg>
			</div>
			<h2 class="text-xl font-semibold my-10 lg:mt-9 lg:mb-44">سراد گالری</h2>

			<div class="flex flex-col mb-3 gap-3">
				<h2 class="text-4xl font-medium mb-3">هنوز عطر اختصاصیتو پیدا نکردی؟</h2>
				<h4 class="text-3xl font-medium mb-1">با هوش مصنوعی بسازش</h4>
				<p class="text-xl font-medium mb-3">به زودی ....</p>
			</div>
		</div>
		<div class="col-span-12 lg:col-span-6 ">
			<img src="<?= get_stylesheet_directory_uri() . '/assets/img/popup.png'; ?>"
				 class="w-full h-full"
				 alt="popup" />
		</div>
	</div>
</div>