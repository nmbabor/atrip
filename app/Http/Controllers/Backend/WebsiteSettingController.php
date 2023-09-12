<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Rules\ValidImageType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageHandlerController;
use DOMDocument;

class WebsiteSettingController extends Controller
{
    public function websiteGeneral(Request $request)
    {
        return view('backend.settings.website-settings.general');
    }

    public function websiteInfoUpdate(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'site_url' => 'url'
        ]);

        foreach ($request->except('_token') as $key => $value) {
            writeConfig($key, $value);
        }

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'website-info'])
            ->with('success', 'Updated successfully');
    }

    public function websiteContactsUpdate(Request $request)
    {
        // <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.685961383561!2d90.41725367597397!3d23.82976368572367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65cf31d3a39%3A0xf77cb33fece3e5d4!2skhilkhet%20Footover%20Brg%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1694480918597!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        foreach ($request->except('_token') as $key => $value) {
            if($key == 'google_map'){
                // Your iframe HTML code
                $iframeCode = $value;

                // Create a DOMDocument object
                $dom = new DOMDocument();
                
                // Load the HTML into the DOMDocument
                $dom->loadHTML($iframeCode);
                
                // Get all <iframe> elements
                $iframes = $dom->getElementsByTagName('iframe');
                
                // Check if there is at least one <iframe> element
                if ($iframes->length > 0) {
                    // Get the src attribute of the first <iframe> element
                    $src = $iframes->item(0)->getAttribute('src');
                    
                    // Output the src attribute
                    $value = $src;
                } else {
                    $value = "No iframe found.";
                }
            }
            writeConfig($key, $value);
        }

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'contacts'])
            ->with('success', 'Updated successfully');
    }

    public function websiteSocialLinkUpdate(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            writeConfig($key, $value);
        }

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'social-links'])
            ->with('success', 'Updated successfully');
    }

    public function websiteStyleSettingsUpdate(Request $request)
    {
        $request->validate([
            'site_logo' => ['file', new ValidImageType],
            'favicon_icon' => ['file', new ValidImageType],
            'favicon_icon_apple' => ['file', new ValidImageType],
        ]);

        writeConfig('newsletter_subscribe', $request->newsletter_subscribe);

        if ($request->hasFile("site_logo")) {
            $imageController = new ImageHandlerController();

            $imageController->securePublicUnlink(readConfig('site_logo'));
            $site_logo = $imageController->uploadToPublic($request->file("site_logo"), "/assets/images/logo");
            writeConfig('site_logo', $site_logo);
        }
        if ($request->hasFile("favicon_icon")) {
            $imageController = new ImageHandlerController();

            $imageController->securePublicUnlink(readConfig('favicon_icon'));
            $favicon_icon = $imageController->uploadToPublic($request->file("favicon_icon"), "/assets/images/logo");
            writeConfig('favicon_icon', $favicon_icon);
        }
        if ($request->hasFile("favicon_icon_apple")) {
            $imageController = new ImageHandlerController();

            $imageController->securePublicUnlink(readConfig('favicon_icon_apple'));
            $favicon_icon_apple = $imageController->uploadToPublic($request->file("favicon_icon_apple"), "/assets/images/logo");
            writeConfig('favicon_icon_apple', $favicon_icon_apple);
        }

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'style-settings'])
            ->with('success', 'Updated successfully');
    }

    public function websiteCustomCssUpdate(Request $request)
    {
        writeConfig('custom_css', $request->custom_css);

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'custom-css'])
            ->with('success', 'Updated successfully');
    }

    public function websiteNotificationSettingsUpdate(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            writeConfig($key, $value);
        }

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'notification-settings'])
            ->with('success', 'Updated successfully');
    }

    public function websiteStatusUpdate(Request $request)
    {
        writeConfig('is_live', $request->is_live);

        return to_route('backend.admin.settings.website.general', ['active-tab' => 'website-status'])
            ->with('success', 'Updated successfully');
    }
}
