	<table cellspacing="0" cellpadding="0" border="0" style="color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px 'Helvetica Neue',Arial,Helvetica"> <tbody><tr width="100%"> <td valign="top" align="left" style="background:#f0f0f0;font:15px 'Helvetica Neue',Arial,Helvetica"> <table style="border:none;padding:0 18px;margin:50px auto;width:500px"> <tbody>

 <tr width="100%"> <td valign="top" align="left" style="border-bottom-left-radius:4px;border-bottom-right-radius:4px;background:#fff;padding:18px"> <h1 style="font-size:20px;margin:0;color:#333">
  Hey {{ucwords($activation->user->first_name.' '.$activation->user->last_name)}}, </h1>

 <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#333"> We're ready to activate your account. All we need to do is make sure this is your email address. </p>

 <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#333">

 <a href="{{url('confirmation', [$activation->code])}}" style="border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 24px;padding:10px 18px;text-decoration:none;width:180px;text-align:center" target="_blank"> Verify Address </a>

 </p>

 <p style="font:15px/1.25em 'Helvetica Neue',Arial,Helvetica;color:#939393;margin-bottom:0"> If you didn't create an account, just delete this email and everything will go back to the way it was. </p>

 </td> </tr>

 </tbody> </table> </td> </tr></tbody> </table>