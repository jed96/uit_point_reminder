<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\Controller;

class TemplateComponent extends Component {

     public function emailHead(){
  $style = $this->styleCss();
  $head = "<!doctype html>
<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Điểm thi mới</title>".$style."
  </head>
  <body class=''>
    <table cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>
            <table class='main'>
              <tr>
        <div class = 'jed'>ĐIỂM THI MỚI CỦA BẠN</div>
      </tr>
              <tr>
                <td class='wrapper'>
                  <table cellpadding='0' cellspacing='0' class=''>
                    <tr>
                      <td class='center'>
                        <p>Chào bạn, bạn vừa có điểm thi mới cập nhật trên hệ thống, đây là bảng điểm mới của bạn trong học kỳ này! Hi vọng đây là tin tốt đối với bạn!</p>
                        <table class='jedtable'>
                          <tbody>
                      <tr>
                        <th>Mã HP</th>
                        <th>Tên HP</th>
                    <th>Điểm QT</th>
                    <th>Điểm GK</th>
                    <th>Điểm TH</th>
                    <th>Điểm CK</th>
                  <th>Điểm HP</th>
                      </tr>";

            return $head;

}
  public function emailFoot(){

            $foot = "</tbody>
                        </table>
                    
               
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            <!-- START FOOTER -->
            <div class='footer'>
              <table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td class='content-block'>
                    <span class='apple-link'>Email này được gửi từ http://uiter.xyz</span>
                    <br>Ngừng nhận email này?<a href='https://facebook.com/jeduit' targer='_blank'> Click</a>
                  </td>
                </tr>
                <tr>
                  <td class='content-block powered-by'>
                   <a href='https://facebook.com/jeduit' targer='_blank'>Jed</a> with love!
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>";

  return $foot;
  } 

  public function emailFirstHead(){

  $style = $this->styleCss();

  $head = "<!doctype html>
<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Đăng ký thành công</title>".$style."
  </head>
  <body class=''>
    <table cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>
            <table class='main'>
              <tr>
        <div class = 'jed jed-register'>ĐĂNG KÝ THÀNH CÔNG</div>
      </tr>";
      return $head;
    }


     public function failMess(){

  $style = $this->styleCss();
  $head = "<!doctype html>
<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Cập nhật lại mật khẩu</title>".$style."

  </head>
  <body class=''>
    <table cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>
            <table class='main'>
              <tr>
        <div class = 'jed jed-reupdate'>CẬP NHẬT LẠI MẬT KHẨU</div>
      </tr>";
      return $head;
    }

    public function styleCss(){
      $style = "    <style>
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }
      table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      .body {
        background-color: #f6f6f6;
        width: 100%; }
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 680px;
        padding: 10px;
        width: 680px; }
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 680px;
        padding: 10px; }

      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }
      .wrapper {
        box-sizing: border-box;
        padding: 20px; }
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

       .jed{

          background: #00c76d;
          color: white;
          text-align: center;
          padding-top: 25px;
          height: 50px;
          font-size: 20px;

          font-weight: bold;

       }

         .jed-reupdate{

          background: #ff5f5f;

       }

        .jed-register{

          background: #3cbcfb;

       }

       .center {
        text-align: left !important;
       }

       td {
        text-align: center !important;
       }

      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; }
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }
      a {
        color: #3498db;
        text-decoration: underline; }

      .last {
        margin-bottom: 0; }
      .first {
        margin-top: 0; }
      .align-center {
        text-align: center; }
      .align-right {
        text-align: right; }
      .align-left {
        text-align: left; }
      .clear {
        clear: both; }
      .mt0 {
        margin-top: 0; }
      .mb0 {
        margin-bottom: 0; }
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }
      .powered-by a {
        text-decoration: none; }
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; }

      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 1 !important;
          border-radius: 2 !important;
          border-right-width: 1 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
       }

       .jedtable td {
       border: 1px solid #32c5d2 !important;
       padding: 5px;

}

    .jedtable{
       border-collapse: collapse;
    }
    .jedtable th {
       border: 1px solid #32c5d2 !important;
       padding: 5px;
}
    </style>";
    return $style;
    }
                      
}