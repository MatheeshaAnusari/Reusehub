<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Plus+Jakarta+Sans%3Awght%40400%3B500%3B700%3B800"
    />

    <title>Stitch Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div
      class="relative flex size-full min-h-screen flex-col bg-white justify-between group/design-root overflow-x-hidden"
      style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'
    >
      <div>
        <div class="flex items-center bg-white p-4 pb-2 justify-between">
          <h2 class="text-[#111714] text-lg font-bold leading-tight tracking-[-0.015em] flex-1 text-center pl-12">Browse</h2>
          <div class="flex w-12 items-center justify-end">
            <button
              class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 bg-transparent text-[#111714] gap-2 text-base font-bold leading-normal tracking-[0.015em] min-w-0 p-0"
            >
              <div class="text-[#111714]" data-icon="MagnifyingGlass" data-size="24px" data-weight="regular">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                </svg>
              </div>
            </button>
          </div>
        </div>
        <div class="px-4 py-3">
          <label class="flex flex-col min-w-40 h-12 w-full">
            <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
              <div
                class="text-[#648772] flex border-none bg-[#f0f4f2] items-center justify-center pl-4 rounded-l-xl border-r-0"
                data-icon="MagnifyingGlass"
                data-size="24px"
                data-weight="regular"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                </svg>
              </div>
              <input
                placeholder="Search for items"
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111714] focus:outline-0 focus:ring-0 border-none bg-[#f0f4f2] focus:border-none h-full placeholder:text-[#648772] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                value=""
              />
            </div>
          </label>
        </div>
        <div class="flex gap-3 p-3 overflow-x-hidden">
          <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-[#f0f4f2] pl-4 pr-2">
            <p class="text-[#111714] text-sm font-medium leading-normal">Category</p>
            <div class="text-[#111714]" data-icon="CaretDown" data-size="20px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
              </svg>
            </div>
          </button>
          <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-[#f0f4f2] pl-4 pr-2">
            <p class="text-[#111714] text-sm font-medium leading-normal">Condition</p>
            <div class="text-[#111714]" data-icon="CaretDown" data-size="20px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
              </svg>
            </div>
          </button>
          <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-[#f0f4f2] pl-4 pr-2">
            <p class="text-[#111714] text-sm font-medium leading-normal">Price</p>
            <div class="text-[#111714]" data-icon="CaretDown" data-size="20px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
              </svg>
            </div>
          </button>
          <button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-[#f0f4f2] pl-4 pr-2">
            <p class="text-[#111714] text-sm font-medium leading-normal">Seller Rating</p>
            <div class="text-[#111714]" data-icon="CaretDown" data-size="20px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" viewBox="0 0 256 256">
                <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
              </svg>
            </div>
          </button>
        </div>
        <h3 class="text-[#111714] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Featured Items</h3>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA02W6W-61sZhrVAPJ1MeCkkXAJvSILKxLW9MV6yRtDsM2Om_6zbAX4Abm-0uRIp5v3WUrJUHpsH8T-p69asn6TuDJ8khKjfLNj2Nv9gitFkya_ze8MP-vOFkb66q1QdyniJGTiRcs6pBsMUyvAL5Q_kfTj3jXZCtIXcjNeHWCHHiVnvNeMdS8yfsaD5OqQpaxJZpwUPwkiwHFK0FUqOf9JHauCmmnj3gWwP0BRVV-Z1u21Q4DhOnJpQ-AMcmgU3vP6H0y4N6GS2Hu7");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Vintage Wooden Desk</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Excellent condition, perfect for home office</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCg0ftoK9VMjVKgfOazjSs-gd_96qjhqt9TmKm3HYh731OrxOYMxUrH3nK8CRB9XNvXfke8JsfJKYsFqyUGrXPOizJZGT6Mm5yfbRhW3Y2I-zBVP_5hRF8UTAH7_Texj08zqtSr7EPZ6uKUIK24nQHrctmsM075VYeEd4HrdNzDC8NJf9mQ7E-64mys_yG1iqLBL8srgYlhOzYjLew9yrV3w1aeE1SrdYT2svozE1gT0hOEZr1jYTXKzhhmgl2hpy6nDufojmWmt7JT");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Refurbished Laptop</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Like new, 16GB RAM, 512GB SSD</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD8BagquntWzNpvIDIhFxlnUx7H9qzKSNUkLjIuaeoZISgoUjs6-11qMoOLIJCs0KNGIu08VkWfyKMSOiLVgMJC5-KI_z8c7ZPaug72_CTkv3vh80HlF54DJkYj2w-lp9PPsuKpIPp9aL1PaniOz5YBskxcmSS9VMAut4w4DersaELZgwNJOauuvAtJhfmK44aUl-pb2h6Kyvou98eJNi0l8jbOig8yb5hl-au_J_67YnTLjq-qNNSP48liHruNGTUUorABPbz_CJuV");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Designer Dress</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Size 8, worn once, original price $200</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBcRnRpaf8kG_NNCu-fFpBgtsYO6Qp21OHO6KzleVpUMKPOx5Nb7JRUmQO267AA5UOCJpUQbPq_LubhQTqPHezsYOO1OVgzmFEkl9QOwGFuDPDmA7KLzb4VIxD4gJPmfaM0wz1_3H71Nal7Y5Cl8ggo8WtZhC5vzrN-gfp_7-E7YZJS8BPJdK4T50hSfh6oeUlbdOx7wQxXCRU3INiCUdUam1Vx0ANxPh7VsB_ZFIs8fWw3kcwIzO5syuzQIFkE1zBZIa8BfzM_AtZ6");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Antique Bookshelf</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Complete set, first editions</p>
            </div>
          </div>
        </div>
        <h3 class="text-[#111714] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Recently Added</h3>
        <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA8nsroaAW4XtLnkf-f9nwYHe4p_dxxM7s7PMQfFnnzBdnCrRj6YRAP2qLAcOmfGMjkIR8f1LqBG2YD-PbXEKmoT0tOxr5A1pKxWTq0Ev3PCGqHNvCh2jAMawuMIv4Fg8VqcscRC8LsjCIJ-NeKJU09lX4eA0jz98AjqV5ARUiwfoV5SelUb_BBiFmU6umyuxcUYzjDbJLzxOAWX9tPtGDdgNvpfysI6PSKTYlIszV8n1DswdTiA1A7vducXOAEegPkgH93vhJzt-cw");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Leather Sofa</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Comfortable and stylish, seats 3</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBjDYYCC2wrUdzLa_xoEiy1QzouJb5u3sHGLRMNVRaJ5QGcxI9zdZw6VJZrVwZg2zmUJnNoB86scOACGPE6PMv1uKX3jddVh4Iokovcnun48UuCw8NC0fSTSzoZgxSCOwyDYb32t5ViszepsvF1u-XOijT-aPAZe6iTNaLx-M7Khb4AxY68I7Hs1JpiTYD5uAa3X5Fa2vrI27wQXqblwOdiWLVGkEIGd3qWxthAsYlXLt2MWpnMIJ2OrB5L_zLs0fCYBLQQ9q-tYwM2");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Smart Watch</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Fitness tracker, heart rate monitor</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDt6RpI6mhPQgpBayw6RM7YSgb7uZNmTjEBZue4GEnXSF5pv4ZQ0amFFN7BGmfhW7NRldwFdyO3PgMXP-Z6QTxzAqnaJIjGT0TrirVEKz3fSpwVRJF8Fcs4isH5H4ZC4yYmzjL8BNNBfUvi95LMQHl_cj1rnsSd9JUECM17R9gpNDysQVo2ri8U_LX3FyXxMzoMz0xCoeHQgfIXTWlXeDVChqMIUAWCbIK9I7PG8CRuFUrlgwG8Tj7QhdQye26QI-9O39iCFqD2RBXs");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Winter Coat</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Size M, warm and waterproof</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 pb-3">
            <div
              class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-xl"
              style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDuGx7QL5ZCQdKiiCPorET0vMYRAC7WLofoAMyOQNDiBuPguznmjWp0ulLfgERvtGFZUi2cHdSkTiOE0BQLS8ERrHXG8cT7NMrP8ZZABXMOgWNN5u49eeGMmxMNRYDQl2QgYkGztfUIDh9yu4lxV_0lI8BAgPvibDDSVg-vbfDKItEDiVvdjShp89JmvD3wuOazaGW5EuwBiBXsIo-l3al56WTdZRojDOe_e_XR7L1p9skLmvdsmOmU84mq_7cg7RKq3qC_3IVxaFWI");'
            ></div>
            <div>
              <p class="text-[#111714] text-base font-medium leading-normal">Coffee Table</p>
              <p class="text-[#648772] text-sm font-normal leading-normal">Modern design, glass top</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="flex gap-2 border-t border-[#f0f4f2] bg-white px-4 pb-3 pt-2">
          <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#648772]" href="#">
            <div class="text-[#648772] flex h-8 items-center justify-center" data-icon="House" data-size="24px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"
                ></path>
              </svg>
            </div>
            <p class="text-[#648772] text-xs font-medium leading-normal tracking-[0.015em]">Home</p>
          </a>
          <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#648772]" href="#">
            <div class="text-[#648772] flex h-8 items-center justify-center" data-icon="HandHeart" data-size="24px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M230.33,141.06a24.34,24.34,0,0,0-18.61-4.77C230.5,117.33,240,98.48,240,80c0-26.47-21.29-48-47.46-48A47.58,47.58,0,0,0,156,48.75,47.58,47.58,0,0,0,119.46,32C93.29,32,72,53.53,72,80c0,11,3.24,21.69,10.06,33a31.87,31.87,0,0,0-14.75,8.4L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM119.46,48A31.15,31.15,0,0,1,148.6,67a8,8,0,0,0,14.8,0,31.15,31.15,0,0,1,29.14-19C209.59,48,224,62.65,224,80c0,19.51-15.79,41.58-45.66,63.9l-11.09,2.55A28,28,0,0,0,140,112H100.68C92.05,100.36,88,90.12,88,80,88,62.65,102.41,48,119.46,48ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9Z"
                ></path>
              </svg>
            </div>
            <p class="text-[#648772] text-xs font-medium leading-normal tracking-[0.015em]">Donate</p>
          </a>
          <a class="just flex flex-1 flex-col items-center justify-end gap-1 rounded-full text-[#111714]" href="#">
            <div class="text-[#111714] flex h-8 items-center justify-center" data-icon="MagnifyingGlass" data-size="24px" data-weight="fill">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M168,112a56,56,0,1,1-56-56A56,56,0,0,1,168,112Zm61.66,117.66a8,8,0,0,1-11.32,0l-50.06-50.07a88,88,0,1,1,11.32-11.31l50.06,50.06A8,8,0,0,1,229.66,229.66ZM112,184a72,72,0,1,0-72-72A72.08,72.08,0,0,0,112,184Z"
                ></path>
              </svg>
            </div>
            <p class="text-[#111714] text-xs font-medium leading-normal tracking-[0.015em]">Browse</p>
          </a>
          <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#648772]" href="#">
            <div class="text-[#648772] flex h-8 items-center justify-center" data-icon="Receipt" data-size="24px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M72,104a8,8,0,0,1,8-8h96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,104Zm8,40h96a8,8,0,0,0,0-16H80a8,8,0,0,0,0,16ZM232,56V208a8,8,0,0,1-11.58,7.15L192,200.94l-28.42,14.21a8,8,0,0,1-7.16,0L128,200.94,99.58,215.15a8,8,0,0,1-7.16,0L64,200.94,35.58,215.15A8,8,0,0,1,24,208V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Zm-16,0H40V195.06l20.42-10.22a8,8,0,0,1,7.16,0L96,199.06l28.42-14.22a8,8,0,0,1,7.16,0L160,199.06l28.42-14.22a8,8,0,0,1,7.16,0L216,195.06Z"
                ></path>
              </svg>
            </div>
            <p class="text-[#648772] text-xs font-medium leading-normal tracking-[0.015em]">Transaction</p>
          </a>
          <a class="just flex flex-1 flex-col items-center justify-end gap-1 text-[#648772]" href="#">
            <div class="text-[#648772] flex h-8 items-center justify-center" data-icon="User" data-size="24px" data-weight="regular">
              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                <path
                  d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"
                ></path>
              </svg>
            </div>
            <p class="text-[#648772] text-xs font-medium leading-normal tracking-[0.015em]">Account</p>
          </a>
        </div>
        <div class="h-5 bg-white"></div>
      </div>
    </div>
  </body>
</html>
