<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Top Mua Tháng 06
  </title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   * {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    background-color: #121a1a;
    font-family: 'Roboto', sans-serif;
    color: #fff;
  }
  .container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 15px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
  }
  .left {
    flex: 1 1 65%;
    min-width: 280px;
  }
  .left img {
    width: 100%;
    border-radius: 16px;
    display: block;
    height: 350px;
  }
  .right {
    flex: 1 1 30%;
    min-width: 280px;
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  .right-header {
    background-color: #0b6a0b;
    border-radius: 6px;
    padding: 12px 20px;
    font-weight: 700;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    color: #e6f4e6;
  }
  .right-header .icon {
    font-weight: 900;
  }
  .list {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .list-item {
    border: 1px solid #0b6a0b;
    border-radius: 6px;
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    font-size: 14px;
    color: #a6f0a6;
  }
  .list-item .name {
    white-space: nowrap;
  }
  .list-item .amount {
    color: #ff4c4c;
    font-weight: 600;
  }
  .btn-nap {
    background-color: #0b6a0b;
    border-radius: 6px;
    padding: 12px 20px;
    font-weight: 700;
    font-size: 16px;
    color: #e6f4e6;
    text-align: center;
    cursor: pointer;
    user-select: none;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
  }
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
    }
    .left, .right {
      flex: 1 1 100%;
      min-width: auto;
    }
    .right-header, .btn-nap {
      font-size: 16px;
      padding: 10px 15px;
    }
    .list-item {
      font-size: 13px;
      padding: 8px 12px;
    }
  }
  </style>
 </head>
 <body>
  <div class="container" role="main">
   <div class="left">
    <img alt="Cartoon character with bunny ears and basket of eggs on left, colorful text CHAGSOAICA.COM in pink and yellow gradient, and cartoon character with white hair riding futuristic purple vehicle on right, green gradient background" height="200" src="./Media/bia1.jpg" width="700"/>
   </div>
   <div aria-label="Top Mua Tháng 06 leaderboard" class="right">
    <div aria-level="2" class="right-header" role="heading">
     <span aria-hidden="true" class="icon">
      ☆
     </span>
     <span>
      <strong>
       TOP Mua Tháng 06
      </strong>
     </span>
    </div>
    <div class="list" role="list">
     <div class="list-item" role="listitem">
      <span class="name">
       1. Vyt***
      </span>
      <span class="amount">
       +795.555 ₫
      </span>
     </div>
     <div class="list-item" role="listitem">
      <span class="name">
       2. Azg******
      </span>
      <span class="amount">
       +570.000 ₫
      </span>
     </div>
     <div class="list-item" role="listitem">
      <span class="name">
       3. Anh*****
      </span>
      <span class="amount">
       +427.000 ₫
      </span>
     </div>
     <div class="list-item" role="listitem">
      <span class="name">
       4. Cal*****
      </span>
      <span class="amount">
       +400.000 ₫
      </span>
     </div>
     <div class="list-item" role="listitem">
      <span class="name">
       5. Duy*********
      </span>
      <span class="amount">
       +345.678 ₫
      </span>
     </div>
    </div>
    <div aria-label="Nạp tiền ngay" class="btn-nap" role="button" tabindex="0">
     <span>
      👉 MUA TRUYỆN NGAY 👈
     </span>
    </div>
   </div>
  </div>
 </body>
</html>
