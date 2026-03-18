<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Visitor Registered</title>
</head>

<body style="margin:0; padding:0; background-color:#f0f4f8; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f0f4f8">
        <tr>
            <td align="center" style="padding: 40px 15px;">

                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                    style="border-radius:12px; overflow:hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">

                    {{-- Header --}}
                    <tr>
                        <td bgcolor="#1a1a2e" align="center" style="padding: 35px 20px;">
                            <h1 style="margin:0; color:#ffffff; font-size:22px; letter-spacing:1px;">
                                🏢 Visitor Management System
                            </h1>
                            <p style="margin:8px 0 0 0; color:#a0aec0; font-size:13px;">
                                Automated Notification
                            </p>
                        </td>
                    </tr>

                    {{-- Alert Badge --}}
                    <tr>
                        <td align="center" style="padding: 25px 20px 10px 20px;">
                            <span
                                style="background:#fff3cd; color:#856404; padding:8px 20px; border-radius:20px; font-size:13px; font-weight:bold; border:1px solid #ffc107;">
                                🔔 New Visitor Alert
                            </span>
                        </td>
                    </tr>

                    {{-- Greeting --}}
                    <tr>
                        <td align="center" style="padding: 10px 40px 20px 40px;">
                            <p style="color:#2d3748; font-size:16px; margin:0; text-align:center;">
                                A new visitor has arrived and is waiting to meet you.
                                <br>Please find the details below.
                            </p>
                        </td>
                    </tr>

                    {{-- Visitor Info Card --}}
                    <tr>
                        <td style="padding: 0 30px 30px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f7fafc; border-radius:10px; overflow:hidden; border:1px solid #e2e8f0;">

                                {{-- Visitor Name --}}
                                <tr>
                                    <td style="padding:16px 20px; border-bottom:1px solid #e2e8f0; width:40%;">
                                        <span
                                            style="color:#718096; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
                                            👤 Visitor Name
                                        </span>
                                        <br>
                                        <strong style="color:#1a1a2e; font-size:16px;">
                                            {{ $visitor->first_name }} {{ $visitor->last_name }}
                                        </strong>
                                    </td>
                                    {{-- Purpose --}}
                                    <td
                                        style="padding:16px 20px; border-bottom:1px solid #e2e8f0; border-left:1px solid #e2e8f0;">
                                        <span
                                            style="color:#718096; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
                                            🎯 Purpose
                                        </span>
                                        <br>
                                        <strong style="color:#1a1a2e; font-size:16px;">
                                            {{ ucfirst($visitor->purpose) }}
                                        </strong>
                                    </td>
                                </tr>

                                {{-- Person to Meet --}}
                                <tr>
                                    <td style="padding:16px 20px; border-bottom:1px solid #e2e8f0;">
                                        <span
                                            style="color:#718096; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
                                            🤝 Person to Meet
                                        </span>
                                        <br>
                                        <strong style="color:#1a1a2e; font-size:16px;">
                                            {{ $visitor->person_to_meet ?? '-' }}
                                        </strong>
                                    </td>
                                    {{-- Department --}}
                                    <td
                                        style="padding:16px 20px; border-bottom:1px solid #e2e8f0; border-left:1px solid #e2e8f0;">
                                        <span
                                            style="color:#718096; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
                                            🏢 Department
                                        </span>
                                        <br>
                                        <strong style="color:#1a1a2e; font-size:16px;">
                                            {{ strtoupper($visitor->department ?? '-') }}
                                        </strong>
                                    </td>
                                </tr>

                                {{-- Registered At --}}
                                <tr>
                                    <td colspan="2" style="padding:16px 20px;">
                                        <span
                                            style="color:#718096; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
                                            🕐 Registered At
                                        </span>
                                        <br>
                                        <strong style="color:#1a1a2e; font-size:16px;">
                                            {{ $visitor->visted_at ? $visitor->visted_at->setTimezone('Asia/Kolkata')->format('d M Y, h:i A') : now('Asia/Kolkata')->format('d M Y, h:i A') }}
                                        </strong>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    {{-- Status Badge --}}
                    <tr>
                        <td align="center" style="padding: 0 30px 30px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#fff8e1; border-radius:8px; border-left:4px solid #ffc107;">
                                <tr>
                                    <td style="padding:15px 20px;">
                                        <p style="margin:0; color:#856404; font-size:14px;">
                                            ⏳ <strong>Status:</strong> Pending Approval —
                                            Please login to the dashboard to approve or reject this visitor.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td bgcolor="#f7fafc" align="center" style="padding:20px; border-top:1px solid #e2e8f0;">
                            <p style="margin:0; color:#a0aec0; font-size:12px;">
                                This is an automated email from
                                <strong style="color:#718096;">Visitor Management System</strong>
                                <br>Please do not reply to this email.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
<!-- ```

---

## Email Preview:
```
┌─────────────────────────────────────┐
│   🏢 Visitor Management System      │
│      Automated Notification         │
├─────────────────────────────────────┤
│        🔔 New Visitor Alert         │
│                                     │
│  A new visitor has arrived and is   │
│  waiting to meet you.               │
├──────────────────┬──────────────────┤
│ 👤 Visitor Name  │ 🎯 Purpose       │
│ John Doe         │ Meeting          │
├──────────────────┼──────────────────┤
│ 🤝 Person to Meet│ 🏢 Department    │
│ Gaurav Kanhere   │ HR               │
├──────────────────┴──────────────────┤
│ 🕐 Registered At                    │
│ 17 Mar 2026, 10:30 AM               │
├─────────────────────────────────────┤
│ ⏳ Status: Pending Approval         │ -->
└─────────────────────────────────────┘