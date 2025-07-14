<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Tunatrack</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9f9f9; font-family: Arial, sans-serif;">
    <table width="100%" bgcolor="#f9f9f9" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; margin: 30px 0;">
                    <tr>
                        <td style="background-color: #FF6B35; padding: 30px; color: white; text-align: center;">
                            <h1 style="margin: 0; font-size: 24px;">Welcome to Tunatrack 🎉</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px; color: #333;">
                            <p style="font-size: 16px; margin-bottom: 20px;">
                                Hi {{ $companyName ?? 'there' }},
                            </p>

                            <p style="font-size: 16px;">Welcome to Tunatrack - Your radar for every parcel delivery. We're thrilled to have you onboard!</p>

                            <p style="font-size: 16px; margin: 30px 0;">
                                We're excited to support your delivery operations with more visibility, control, and peace of mind. If you have any questions, please reach out to our support team at [support@tunatrack.co.ke] 
                            </p>
                            <p style="font-size: 16px; margin-top: 20px;">
                                To get started, please access our application using the link below, and use the forgot password functionality to create a secure password for your account. Please be sure to use the onboarded email, your security is of essence.
                                If you encounter any issues whatsoever, please <a href="mailto:support@tunatrack.co.ke" style="color: #FF6B35; text-decoration: none;">give us a shout</a> and we'll be happy to assist you.
                            </p>

                            <p>
                                <a href="{{ $loginUrl }}" style="display: inline-block; padding: 12px 24px; background-color: #FF6B35; color: white; text-decoration: none; border-radius: 8px;">Get Started</a>
                            </p>
                            <p style="font-size: 16px; margin-top: 20px;">
                                Thank you for choosing Tunatrack. We look forward to helping you track your deliveries with ease!
                            </p>
                            <p style="font-size: 14px; color: #666; margin-top: 40px;">
                                If you didn’t request this, you can safely ignore this email.
                            </p>

                            <p style="font-size: 16px;">Warm Regards,<br/>TunaTrack Team</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #FF6B35; padding: 20px; text-align: center; color: white;">
                            <p style="margin: 0;">© {{ date('Y') }} Tunatrack. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
