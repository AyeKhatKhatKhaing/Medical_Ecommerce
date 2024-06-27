@extends('frontend.layouts.master')
@if (Route::currentRouteName() == 'privacy.policy')
@include('frontend.seo', ['seo' => isset($privacy) ? $privacy : ''])
@elseif(Route::currentRouteName() == 'termofuse')
@include('frontend.seo', ['seo' => isset($terms) ? $terms : ''])
@elseif(Route::currentRouteName() == 'termofuse.coupon')
@include('frontend.seo', ['seo' => isset($terms_coupon) ? $terms_coupon : ''])
@endif
@section('content')
    <main>
        <section class="dash-banner-section">
            <div component-name="me-terms-of-use-banner">
                <div class="relative">
                    @if (Route::currentRouteName() == 'privacy.policy')
                        <img src="{{ isset($privacy->img) ? $privacy->img : "" }}"
                            alt="background image" class="w-full xl:h-[325px] h-[180px] object-cover" />
                    @elseif(Route::currentRouteName() == 'termofuse')
                        <img src="{{ isset($terms->img) ? $terms->img : "" }}"
                            alt="background image" class="w-full xl:h-[325px] h-[180px] object-cover" />
                    @elseif(Route::currentRouteName() == 'termofuse.coupon')
                            <img src="{{ isset($terms_coupon->img) ? $terms_coupon->img : "" }}"
                                alt="background image" class="w-full xl:h-[325px] h-[180px] object-cover" />
                    @endif
                    <h1
                        class="me-body32 text-whitez helvetica-normal font-bold text-center absolute top-1/2 left-1/2 dashboard-title">
                    </h1>
                </div>
            </div>
        </section>
        <div component-name="me-terms-of-use" class="me-terms-of-use">
            <div class="me-terms-of-use-container xl:mt-[110px] mt-[50px] mb-[52px]">
                @if (Route::currentRouteName() == 'privacy.policy')
                    <h1><b> {{ langbind($privacy, 'name') }} </b></h1><br />
                @elseif(Route::currentRouteName() == 'termofuse')
                    <h1><b> {{ langbind($terms, 'name') }} </b></h1><br />
                @elseif(Route::currentRouteName() == 'termofuse.coupon')
                    <h1><b> {{ langbind($terms_coupon, 'name') }} </b></h1><br />
                @endif


                @if (Route::currentRouteName() == 'privacy.policy')
                     {!! langbind($privacy, 'content') !!} 
                @elseif(Route::currentRouteName() == 'termofuse')
                     {!! langbind($terms, 'content') !!} 
                @elseif(Route::currentRouteName() == 'termofuse.coupon')
                     <h1><b> {!! langbind($terms_coupon, 'content') !!} </b></h1><br />
                @endif
                {{-- <div>
                    <h1><b>Terms of Use</b></h1><br />
                    <div class="mb-10">
                        <p>Through this website (“Website”), MediQ Health Service (Asia) Limited as well as all its
                            affiliates
                            (collectively “MediQ”, “Company”, or “we”) provides you with an online platform (“Platform”)
                            through
                            which you can browse and request to make reservations with healthcare and medical services of
                            third-party suppliers (“Suppliers”), which include healthcare institutions, registered medical
                            practitioners and other healthcare professionals (“Services”). Please read these Terms of Use
                            carefully before accessing or using any part of this Platform and/or request for any Services
                            provided
                            by the Suppliers. By accessing this Website and/or persons for whom you make an order of the
                            Services, you will be deemed a user under MediQ (“User”) and you have read, understood and agree
                            to be bound by these Terms of Use and any changes and/or amendments made to these Terms of
                            Use from time to time. Please read these Terms of Use carefully and we reserve the final right
                            to
                            interpret these Terms of Use. <br /><br />

                            These Terms of Use incorporate various policies, including but not limited to those listed
                            below.
                            The
                            policies may apply to specific Services or programs offered by MediQ.
                            <a href="/">Privacy Policy, Price Guarantee, Money Back Guarantee, User Reviews
                                Guidelines,
                                FAQs</a><br /><br />

                            This Platform may also host special events, such as competitions and/or other sales activities.
                            These
                            events may be subject to extra terms and conditions, regulations and/or policies in addition to
                            these
                            Terms of Use. Alternatively, the terms and conditions, regulations and/or policies may replace
                            any
                            part
                            of these Terms of Use. By participating or making reservations for such events, you will be
                            deemed
                            that you have agreed to be bound by the extra or replaced terms and conditions, regulations
                            and/or
                            policies.<br /><br />

                            Caution:<br /><br />

                        <ul class="list-decimal">
                            <li>This Platform or Services are not suitable for any urgent, emergent, or critical medical
                                conditions.
                                If you need medical advice or treatment, please contact the emergency services immediately.
                            </li>
                            <li>Any or more parts of this Platform are only available to Users from [Hong Kong]. If you are
                                currently at any place other than aforementioned place, and/or have any doubt about our
                                Platform, please do not access or use any part of this Platform or make an order of the
                                Services.
                            </li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>Registration</b></h2><br />
                    <div class="mb-10">
                        <p>Registration to be a MediQ User is free upon filling in the required information on this Website,
                            agreeing to these Terms of Use, and verifying the applicant’s mobile number. We will send an
                            email
                            to
                            the User’s registered email address after a successful registration.</p>
                    </div>
                    <h2><b>User’s Responsibility</b></h2><br />
                    <div class="mb-10">
                        <p>You</p><br />

                        <ul class="list-decimal">
                            <li>
                                In order to use our Platform or order Services, you must register to be a User on this
                                Platform. By registering to be a User, you unconditionally and irrevocably represent and
                                warrant that you are aged 18 or over (and we have the right to rely on such declarations
                                accordingly) and have the ability to constitute a legally binding agreement.
                            </li>
                            <li>
                                The Services described on our Platform are for your personal use only. You are prohibited to
                                sell
                                or resell any Services ordered from this Platform or obtained Services in other ways. If we
                                suspect that you may or have violated these Terms of Use at our sole discretion, we reserve
                                the
                                right to cancel your membership as the User and/or cancel or reduce the number of any
                                Services
                                provided to you with or without notice. You should also note that if you use or order the
                                Services
                                provided by this Platform, you may be subject to additional terms and conditions. Regarding
                                these
                                additional terms and conditions, we will notify you separately when you order the relevant
                                Services.
                            </li>
                            <li>
                                In light of your use of our Platform and/or ordering of the Services, you hereby agree
                                that:
                            </li>
                        </ul>
                    </div>
                    <h2><b>Order</b></h2><br />
                    <div class="mb-10">
                        <p>You are aged 18 years or above and capable of forming a legally binding contract.<br /><br />

                            Any required time for confirmation as stated on the Platform is solely for reference only. The
                            actual
                            time required for confirmation may vary.<br /><br />

                            The Platform system will send a notification to the mobile number and/or email address
                            registered by
                            the User to confirm that we have received your order. This communication will not be our
                            acceptance
                            of your order on behalf of the Suppliers. You may track your order status on this
                            Website.<br /><br />

                            MediQ is not the supplier of the Services. We are solely responsible for managing and
                            administering
                            the Platform, arranging order processing and fulfilment of the reservations you ordered from the
                            Suppliers through this Website.<br /><br />

                            The Suppliers are solely responsible for accepting or rejecting any Services of your order and
                            providing and performing services related to all such Services. Please consult with the
                            Suppliers if
                            you
                            have any enquiries in respect of the Services.<br /><br />

                            Our acceptance of your order only covers the Services mentioned in it and may not cover all the
                            Services you ordered. If this is the case, your order for the remaining Services will only be
                            accepted
                            when we send a further acceptance of that part of your order.<br /><br />

                            Whilst the Suppliers are required to provide MediQ with accurate and updated prices of the
                            Services
                            on the Platform, MediQ cannot guarantee that Services are accurate and updated at all times.
                            MediQ
                            reserves the right to deny and cancel any orders for any reasons with or without notice,
                            including
                            without limitation:<br /><br />

                            No Services can be arranged you have ordered; and
                            The Services you ordered was listed with incorrect information (e.g. in terms of price,
                            conditions,
                            points) due to a human or computer error or an error in the information provided by the
                            Suppliers.
                            If your booking is affected by an error, MediQ will notify you by the email address you provided
                            when
                            you made the booking and will adjust the booking or award points as appropriate and will, if
                            relevant,
                            refund some or all of the amounts charged.<br /><br />

                            You must use Services on or by the expiry date, appear in person at the service location
                            designated
                            by the relevant Suppliers on time and provide the documents, information and/or a valid
                            identification
                            document (such as a Hong Kong Identity Card, Birth Certificate or Passport) required by the
                            Suppliers
                            for verification. If you do not use the Services within the deadline, fail to appear on time, or
                            fail to
                            provide the required documents or information, no refunds will be granted.</p>
                    </div>
                    <h2><b>Price and Payment</b></h2><br />
                    <div class="mb-10">
                        <p>We accept payment methods including VISA, MasterCard, American Express, UnionPay, AlipayHK,
                            WeChat Pay, FPS, PayPal, PayMe and bank transfers. All orders will be charged in Hong Kong
                            Dollars.<br /><br />

                            We will use all reasonable commercial endeavours to display accurate and up-to-date prices on
                            this
                            Website. As prices are often subject to being updated to us by the Suppliers, we cannot state
                            the
                            definite price until we send you the acceptance of your order.<br /><br />

                            For a variety of reasons, Payment on the Website may not be successful. In this case, we will
                            offer
                            you alternatives, if available, to ensure that your reservation can go smoothly. If you have any
                            questions, please contact our Customer Service Center.<br /><br />

                            If the price at the time we are ready to send our acceptance of your order is higher than the
                            price
                            at
                            the time you placed your order, then we will either cancel your order or contact you to inquire
                            if
                            you
                            wish to pay a higher price or cancel your order.<br /><br />

                            You agree and accept that we will not be obliged to offer any compensation for the
                            disappointment
                            suffered by your order being cancelled. However, if you have already made the payment, we will
                            refund the paid amount to your credit card or the relevant payment account, which you used to
                            settle
                            the payment.<br /><br />

                            We reserve the right to change the prices and charges at any time, which may be sent by email or
                            posted on this Website. If you use or continue to use the Services after notice of such changes
                            is
                            issued, that constitutes your acceptance of any new or revised fees or charges.</p>
                    </div>
                    <h2><b>Cancellation and Refund</b></h2><br />
                    <div class="mb-10">
                        <p>Unless otherwise specified, all your payments to the Company are non-refundable under any
                            circumstances. Please read the contents and policies of the service page carefully before you
                            place
                            an order.<br /><br />

                            If the Services you ordered are marked with a Money Back Guarantee, please click here for
                            relevant
                            refund details.<br /><br />

                            If we have approved your refund request for the relevant Services you ordered in accordance with
                            the
                            Money Back Guarantee, we have the right to deduct any administrative fees before making a refund
                            to you.<br /><br />

                            For the avoidance of doubt, if the promo code or e-coupon has been used at the time of ordering,
                            even if you apply for a cancellation or refund, such promo code or e-coupon will not be returned
                            or
                            refunded under any circumstances.</p>
                    </div>
                    <h2><b>Promotional Offers</b></h2><br />
                    <div class="mb-10">
                        <p>
                            We may offer promotional rates, promo codes, e-coupons, discounts and special offers
                            (“Promotional
                            Offers”) from time to time. Unless expressly stated otherwise, Promotional Offers may not be
                            combined and are subject to relevant terms and conditions.<br /><br />

                            Promo codes and e-coupons<br /><br />
                        <ul class="list-decimal">
                            <li>Promo codes and e-coupons offered by us are only applicable for one-time purchases on this
                                Website. You must use a valid promo code or e-coupon on the payment page to apply them to
                                your order;</li><br />
                            <li>The promo codes and e-coupons may not be applicable to certain services or offers;</li>
                            <br />
                            <li> Unless otherwise stated, promo codes and e-coupons are non-transferable, non-cumulative,
                                and
                                cannot be redeemed or converted for cash, points, other products or Services;</li><br />
                            <li> In case of booking cancellation, the promo code and/or e-coupon used on that order will be
                                forfeited and cannot be returned or compensated. The promo code and e-coupon do not have any
                                cash and refund value;</li><br />
                            <li> We reserve the right to stop you from using promo codes or e-coupons if the Users are
                                deemed to
                                have misused the promo codes or e-coupons;</li><br />
                            <li> We reserve the right to change the terms without prior notice; and</li><br />
                            <li> In case of any dispute, we reserve the right of final decision.</li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>Abuse of Discounts</b></h2><br />
                    <div class="mb-10">
                        <p>In the event that it has come to our attention or in our suspicion that a promo code, e-coupon or
                            point
                            has been obtained in a fraudulent manner, in a manner that violates this Terms of Use or in a
                            manner
                            otherwise not intended by MediQ, we will reserve the following rights:<br /><br />
                        <ul>
                            <li>Immediate termination of your MediQ account;</li><br />
                            <li>Cancellation of all previously accrued promo codes, e-coupons and/or points;</li><br />
                            <li>Refuse to provide you with any Services; or</li><br />
                            <li>Any other measures as deemed appropriate by us at our sole discretion.</li>
                        </ul>
                        </p>

                    </div>
                    <h2><b>Use of the Website</b></h2><br />
                    <div class="mb-10">
                        <p>You may only use this Website for bona fide and lawful enquiries or orderings and hereby
                            undertake
                            not to make any speculative, false or fraudulent orderings or orderings of any anticipated
                            demand.
                            You undertake that the payment details provided to us at the time of ordering are fully correct.
                            You
                            also undertake to provide us with correct and accurate email, mailing address and/or other
                            contact
                            details and acknowledge that we may use these details to contact you in the event that this
                            should
                            prove necessary. Please also consult our <a href="/">Privacy Policy</a>.<br /><br />

                            Accordingly, as a condition of your use of this Website, you agree not to use this Website or
                            its
                            contents or information, directly or indirectly, for any commercial or non-personal purpose or
                            for
                            any
                            purpose that is unlawful, illegal or prohibited by the Terms of Use. Unless authorised in prior
                            writing by
                            us in advance, you may not modify, copy, distribute, transmit, display, perform, reproduce,
                            publish,
                            license, create derivative works from, transfer, sell or resell any information, software,
                            products
                            or
                            services obtained from this Website. In addition, you agree not to:<br /><br /></p>
                        <ul>
                            <li>Use this Website or its content for any unauthorised commercial purpose, including without
                                limitation any distribution or resale of reservations without permission;</li><br />
                            <li>Make any speculative, false or fraudulent ordering;</li><br />
                            <li>Deliver any content that infringes or violates the intellectual property or other rights of
                                any
                                entity or
                                individual, including without limitation copyrights, patents, trademarks, laws governing
                                trade
                                secrets, rights to privacy or publicity;</li><br />
                            <li>Impersonate another person or entity, falsely claim or otherwise misrepresent your
                                affiliation
                                with
                                another person or entity, or use a false identity in order to mislead, deceive or defraud
                                another;</li>
                            <li> Use the Website in any way that damages, disables, overburdens, impairs or otherwise
                                interferes
                                with the use of the Website or equipment by other Users, or causes damage to, disruption or
                                limits the functionality of any software, hardware or telecommunications equipment;</li>
                            <br />
                            <li>Attempt to gain unauthorised access to browse or use this Website, any affiliated website,
                                other
                                accounts, computer systems or networks connected to this Website through hacking, password
                                mining or any other means;</li><br />
                            <li>Deliver through this Website illegal postings under any applicable laws or regulations or
                                any
                                postings that advocate illegal activity;</li><br />
                            <li> Deliver or provide links to any content that could be deemed harmful, obscene,
                                pornographic,
                                indecent, violent, abusive, profane, racist, discriminatory, abusive, threatening,
                                distorting,
                                harassing, hateful or otherwise objectionable;</li><br />
                            <li>Deliver or provide links to any content that is defamatory, libellous, false or slanderous;
                                and
                            </li>
                            <li>Do anything else that damage or negatively impact the reputation of the Website, MediQ,
                                related
                                companies, and each of their employees;</li><br /><br />
                        </ul>
                        <p>We may use proprietary or third-party technology (such as Google reCAPTCHA) on our Website
                            pages to keep the Website safe from malicious attackers or anyone who abuses the Website.</p>
                    </div>
                    <h2><b>Website Content</b></h2><br />
                    <div class="mb-10">
                        <p>All materials displayed or presented on this Platform, including but not limited to text, data,
                            graphics,
                            articles, photos, images, illustrations, videos, audio and other materials ("Content"), are
                            subject
                            to
                            copyright and/or intellectual property protection. All content on this Platform is intended
                            solely
                            for your
                            personal and non-commercial use of the Services and must be used in accordance with these Terms
                            of Use.<br /><br />

                            If we agree to grant you access to the Platform and/or Content, such access is non-exclusive,
                            non-transferable, and limited to access in accordance with these Terms of Use. We may, at our
                            absolute discretion, modify, delete or change the presentation, substance or functionality of
                            any
                            part
                            or all of the Content from the Platform at any time without prior notice.<br /><br />

                            You shall abide by all copyright notices, trademark rules, and restrictions contained in the
                            Platform
                            and the Content accessed through the Platform and shall not use, copy, reproduce, modify,
                            translate,
                            publish, broadcast, transmit, distribute, perform, upload, display, licence, sell or otherwise
                            exploit for
                            any purposes whatsoever the Platform, Platform Content, third-party submissions, or other
                            proprietary
                            rights not owned by you without the prior express wrote consent of the respective owners, or in
                            any
                            way violates any third-party rights.<br /><br />

                            Our search results are sorted and filtered by criteria such as availability, price suggestions,
                            service
                            popularity, service reviews, or other criteria. We continue to improve this Platform to provide
                            you
                            with
                            the best experience and may test different default ranking algorithms from time to time.
                        </p>
                    </div>
                    <h2><b>Review and Messages</b></h2><br />
                    <div class="mb-10">
                        <p>By completing an order, you agree to receive confirmation messages (email and/or SMS). After
                            completing the Services, email invitations will be sent for you to fill in user reviews, for
                            which
                            leaving a
                            review is optional. The order confirmations and user review invitations are part of the order
                            process
                            and are not part of the newsletters or marketing emails you can unsubscribe from. The submitted
                            user
                            review (including all text, files, images, photos, sounds, videos or other materials) (“User
                            Review”) will
                            be uploaded to the relevant service page of the Platform within 72 hours in order to inform
                            future
                            Users of your opinion on the rating and quality of the Services.<br /><br />

                            By posting a User Review, you grant us full, perpetual, free, transferable and irrevocable
                            rights to
                            all
                            submitted User Review. MediQ reserves the right to translate, edit, adjust, refuse or remove the
                            User
                            Review at its sole discretion.<br /><br />

                            You confirm you will comply with the <a href="/">User Review Guidelines</a>. In addition,
                            you
                            represent and warrant
                            that:<br /><br />
                        <ul>

                            <li>You own and control all the rights to the content of User Review that you post or
                                distribute, or
                                you
                                have the legal right to post or distribute User Review through the Platform;</li><br />
                            <li>Such User Review is accurate and not misleading, erroneous, defamatory or in other offensive
                                or
                                inappropriate manner;</li><br />
                            <li>The use, distribution, or other dissemination of User Review does not violate these Terms of
                                Use
                                or any applicable laws and regulations and does not violate any rights of, or cause any harm
                                to,
                                any person or entity;</li><br />
                            <li>In respect of User Review, grant us a permanent, irrevocable, non-exclusive, global,
                                transferable,
                                sublicensable, fully paid, royalty-free license to reprint, distribute, communicate to the
                                public,
                                perform publicly, revise, compile derivative works, display and any other use of the User
                                Review
                                (including but not limited to promoting and reposting part of or all Website in any media
                                format
                                and through any media channels). Without restrictions, the rights granted to us by you under
                                this
                                clause include the right to grant sublicenses to Users to use User Review when the Platform
                                functions permit from time to time. You hereby waive and urge all other creators of User
                                Review
                                to
                                waive all moral rights of User Review (including the right to identify the creator of User
                                Review or
                                the right to oppose any derogatory processing of User Review), regardless of whether the
                                relevant rights are currently or may exist anywhere in the world at any time in the future.
                            </li><br />
                            <li>You have the legal rights and powers to grant the license mentioned in subclause (c) above;
                            </li>
                            <br />
                            <li>You are the owner of the User Review and/or have all the necessary rights, consents,
                                permissions
                                and licences that can grant us the licence mentioned in subclause (c) above;</li><br />
                            <li>We will not infringe the intellectual property rights or other rights of any third party by
                                exercising
                                the licence mentioned in subclause (c) above;</li><br />
                            <li>If the User Review identifies any individual person (whether by name, picture or other
                                means),
                                you have obtained all the consents and permission of such person, so that we can use the
                                User
                                Review under the licence mentioned in subclause (c) above;</li><br />
                            <li>At our request, you will provide us with a written copy of any consents, permits and
                                licences
                                that
                                you need to obtain;</li><br />
                            <li>You are responsible for all legal responsibilities for the User Review. Regardless of
                                whether we
                                are aware of any User Review, we are not responsible or liable for any User Review under any
                                circumstances;</li><br />
                            <li>User Review must not contain illegal, obscene, foul language, inappropriate content,
                                hateful,
                                offensive or advocating illegal content, and must not contain personal and other personal
                                information such as names, phone numbers or email addresses, and irrelevant content such as
                                promotional, invite and reward information. Additionally, User Review must not contain
                                content
                                that is defamatory, abusive, harassing or violates the legal rights of others;</li><br />
                            <li>You grant us the right to pursue at law any person or entity that violates your or MediQ’s
                                rights in
                                the User Review by breaching the Terms of Use. You agree you will be solely responsible for
                                the
                                User Review that you provide or submit; and
                                User Review submitted by Users will be considered non-confidential, and we are under no
                                obligation to treat it as proprietary. Without limiting the foregoing, we reserve the right
                                to
                                use
                                such</li><br />
                            <li>User Review in appropriate circumstances, including but not limited to deleting, editing,
                                modifying,
                                rejecting or refusing to post the User Review. We are under no obligation to offer you any
                                payment for content you submit, nor do we provide you with the opportunity to edit, delete
                                or
                                otherwise modify the User Review after it has been submitted to us. We are not responsible
                                for
                                granting you attribution authorship for this User Review, and we are not obligated to
                                enforce
                                any
                                form of attribution rights of third parties. For details, please refer to the Terms of Use
                                on
                                this
                                Platform.</li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>Intellectual Property Rights</b></h2><br />
                    <div class="mb-10">
                        <p>All patents, domain names, databases, trademarks, copyright, product names, company names or
                            logos on this Platform are our property or that of their respective owners. No permission is
                            given
                            by us
                            in respect of any use, copy, selling, reselling, accessing, modification or otherwise use for
                            any
                            purpose of any such patents, domain names, databases, trademarks, copyright, product names,
                            company names, logos or titles which may constitute an infringement of the holder's
                            rights.<br /><br />

                            The intellectual property rights in all content, User Review, designs, text, graphics, database
                            and
                            other
                            materials on this Platform and the selection or arrangement thereof are owned, controlled or
                            licensed
                            by us. Any authorised use without our prior express written permission is strictly prohibited.
                        </p>
                    </div>
                    <h2><b>Disclaimer</b></h2><br />
                    <div class="mb-10">
                        <p>The content included in this Website is provided to you on an "as is" and an "as available"
                            basis. We
                            do not give any other warranty, expressed or implied, or make any representation, including
                            without
                            limitation, that the content on this Website is complete or accurate up to date. Further, we do
                            not
                            warrant or make any representations concerning the likely results or reliability of the use of
                            the
                            materials on this Website or otherwise relating to such materials or on any sites linked to this
                            Website.
                            MediQ reserves the right in its sole discretion and without any obligation or notice or
                            requirement
                            to
                            change, alter or edit the content on this Website.<br /><br />

                            All information on this Website is for educational or informational purposes only and is not
                            intended as
                            a substitute for professional medical care or advice. While every effort has been made to ensure
                            the
                            accuracy of the information on this Website, it cannot be guaranteed to be absolutely accurate
                            and
                            timely and is subject to change without any prior notice. If you have any medical concerns or
                            treatment necessary, please consult your doctor or healthcare provider.<br /><br />

                            To the fullest extent permitted by law, we will not accept any liability whatsoever for any
                            direct,
                            indirect, consequential, collateral, special, punitive or incidental loss, destruction or damage
                            (including
                            but not limited to corruption of data, loss of profits, goodwill, bargain or opportunity or loss
                            of
                            anticipated savings or any other loss) resulting from your access to, reliance on, or use of, or
                            inability
                            to use any part of MediQ (including any third-party Services) whether based on warranty,
                            contract,
                            tort, negligence or any other legal theory, and whether or not we know of or reasonably should
                            have
                            known about the possibility of such damages.<br /><br />

                            We shall not be liable or be deemed to be in default for any failure to perform any of our
                            obligations
                            under the T&C due to reasons beyond its reasonable control and/or force majeure. Such causes or
                            circumstances shall include, but shall not be limited to, acts of God, casualties, accidents,
                            acts
                            of the
                            Government, fires, floods, epidemics, quarantine restrictions, strikes, civic unrests, labour or
                            material
                            shortages, freight embargoes, transportation delays, unusually severe weather, electrical power
                            failures, interruption of telecommunication or internet backbone, failure of an internet access
                            provider
                            or other similar causes beyond our control. We shall not be liable for losses, expenses or
                            damages,
                            ordinary, special, remote or consequential, resulting directly or indirectly from such
                            causes.<br /><br />

                            MediQ does not be liable for any events beyond its reasonable control or consequential loss
                            arising
                            therefrom.<br /><br />

                            MediQ does not make any statements or warranties regarding the quality satisfaction,
                            merchantability,
                            non-infringement or suitability of Services provided on this Platform.<br /><br />

                            Unless required by the law, MediQ will not be responsible to you for any indirect or
                            consequential
                            loss,
                            damage or expense, including any loss of profit, business or goodwill caused by your
                            notification of
                            MediQ’s problems, and under no circumstances will the maximum total liability of MediQ exceed
                            HK$1,000.00.<br /><br />

                            These Terms of Use have included all the terms and commitments of us to you in relation to the
                            use
                            of
                            our Platform, and revoke any representations, commitments and guarantees that we made to you
                            before entering into these Terms of Use.<br /><br />

                            Notwithstanding any other provision in these Terms of Use, nothing in these Terms of Use affect
                            or
                            limit your rights as a consumer under the Hong Kong SAR law and we make no warranties, whether
                            express or implied, in relation to it and its use. You acknowledge that we cannot guarantee and
                            cannot be responsible for the security or privacy of our Website and any information provided by
                            you.<br /><br />

                            You must bear the risk associated with the use of the Internet. Whilst we will try to ensure
                            that
                            material included on the Platform is correct, reputable and of high quality, we cannot accept
                            responsibility if this is not the case. We will not be responsible for any errors or omissions
                            or
                            for the
                            results obtained from the use of such information or for any technical problems you may
                            experience
                            with the Platform. If we are informed of any inaccuracies in the material on the Platform we
                            will
                            attempt to correct this as soon as we reasonably can.<br /><br />

                            In particular, we disclaim all liabilities in connection with the following:<br /><br />
                        <ul>


                            <li>Incompatibility of this Website and/or this Platform with any of your equipment, software or
                                telecommunications links;</li><br />
                            <li>Technical problems including errors or interruptions of this Website and/or this Platform;
                            </li>
                            <br />
                            <li>Unsuitability, unreliability or inaccuracy of this Website and/or this Platform; and</li>
                            <br />
                            <li>Failure of this Website and/or this Platform to meet your requirements.
                                To the full extent allowed by applicable law, you agree that we will not be liable to you or
                                any
                                third party for any consequential or incidental damages (both of which include, without
                                limitation, pure
                                economic loss, loss of profits, loss of business, loss of anticipated savings, wasted
                                expenditure, loss
                                of privacy and loss of data) or any other indirect, special or punitive damages whatsoever
                                that
                                arise
                                out of or are related to this Website and/or this Platform.</li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>Linked Websites</b></h2><br />
                    <div class="mb-10">
                        <p>This website may contain links to third-party websites, services, products or advertisements.
                            These
                            links are not maintained or controlled by MediQ, and we are not responsible for the
                            availability,
                            content or accuracy of these external resources, nor for any loss or damage incurred as a result
                            of
                            the
                            use of the information on this Website. These linked sites provided on this Website should not
                            be
                            considered or construed as our endorsement or verification of such linked websites or their
                            content,
                            and shall not be deemed to endorse, invite, recommend, approve, guarantee or introduce any third
                            parties or their services/products/contents, or have any form of cooperation with such third
                            parties
                            and
                            websites.</p>
                    </div>
                    <h2><b>Suppliers / Services Providers</b></h2><br />
                    <div class="mb-10">
                        <p>Where available and applicable, you will access the services of third-party providers, the
                            Suppliers,
                            through this Platform. These Suppliers will provide services either online or within a clinic or
                            physical
                            location and are subject to availability, and fees and charges may apply. Our provision of
                            access to
                            those services cannot be regarded as our admission of liability arising out of your use of those
                            services. You acknowledge and agree that MediQ, as the Platform operator:<br /><br />
                        <ul>
                            <li>Make no statements, representations or warranties, express or implied, in relation to any
                                Services
                                provided or rendered by the Suppliers;</li><br />
                            <li>Does not agree, does not disagree, does not approve and does not endorse any advice,
                                materials
                                or services offered by any Suppliers;</li><br />
                            <li>Shall not be responsible for any advice, materials and/or services provided by any
                                Suppliers;
                            <li>Does not make any guarantees about the performance of the services that each Supplier is
                                responsible for;</li><br />
                            <li>Shall not accept any liability, obligation or responsibility whatsoever for any direct or
                                indirect loss,
                                costs or damage (including without limitation to consequential loss, lost profits or damage)
                                howsoever arising out of any use, inability to use or misuse of or reliance on advice,
                                materials
                                or
                                services provided by any Suppliers; and</li><br />
                            <li>Shall not have or accept any liability, obligation or responsibility for any loss, damage,
                                property
                                damage, personal injury or death of the User arising out of or in connection with the
                                provision
                                of
                                the Services by the Suppliers.</li>
                        </ul><br />

                        <p>Whilst the Suppliers are required to provide MediQ with accurate and updated information of the
                            Services on the Platform, MediQ cannot guarantee that Services are accurate and updated at all
                            times. We reserve the right to do any of the following at any time for any reasons without
                            notice,
                            including without limitation:</p><br /><br />
                        <ul>
                            <li>Amend, modify, add, delete or revise in any way any information of this Provider Services
                                and/or
                                these Terms of Use;</li><br />
                            <li>Suspend or terminate the Provider Service, or any portion of the Provider Service, for any
                                reason;</li><br />
                            <li>Expand, add, modify, reduce, remove or change the Provider Service, or any portion of the
                                Provider Service; and</li><br />
                            <li>Interrupt the operation of the Provider Service, or any portion of the Provider Service, as
                                necessary to perform maintenance, error correction, or other changes.</li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>Terms of Use Modifications</b></h2><br />
                    <div class="mb-10">
                        <p>We may change or modify any part of this Terms of Use from time to time without prior notice. We
                            will
                            post the changes to or modifications of this Terms of Use on this Website. You should visit this
                            page
                            periodically to review the current Terms of Use to which you are bound. Your continued use of
                            this
                            Platform after any such changes or modifications constitutes your acceptance of the revised
                            Terms of
                            Use.</p>
                    </div>
                    <h2><b>The Use of this Website Is At Your Risk</b></h2><br />
                    <div class="mb-10">
                        <p>We cannot guarantee the identity of any other Users you may interact with while using the
                            Platform.
                            We cannot guarantee the authenticity and accuracy of any content, material or information that
                            other
                            Users or Suppliers may provide. All content you access by using the Platform is at your own
                            risk,
                            and
                            you will be solely responsible for any damage or loss incurred by anyone as a result of your
                            use.<br />

                            Under no circumstances will we be liable for any Content, including without limitation any
                            errors or
                            omissions in any Content, or any loss or damage of any kind incurred in connection with the use
                            of
                            or
                            exposure to any Content posted, emailed, accessed, transmitted, or otherwise made available via
                            the
                            Platform.</p>
                    </div>
                    <h2><b>Indemnities</b></h2><br />
                    <div class="mb-10">
                        <p>You hereby agree to defend, indemnify and hold MediQ harmless against all damages, losses,
                            liabilities, settlements, expenses and costs (including legal costs) suffered or incurred by
                            MediQ,
                            our
                            related companies, officers, directors, employees and agents in connection with or arising
                            from:<br /><br />
                        <ul>
                            <li>Your access to this Website and/or use of online services;</li><br />
                            <li>Any other party using your id and/or login password to access this Website and/or use the
                                online
                                services;</li><br />
                            <li>Your breach of any of these Terms of Use; or</li><br />
                            <li>Any other party being able to access this Website and/or use the online services by using
                                your
                                user ID and/or login password in breach of any of these Terms of Use.</li>
                        </ul>
                        </p>
                    </div>
                    <h2><b>General Provisions</b></h2><br />
                    <div class="mb-10">
                        <p>"Working Day" means Monday to Friday, excluding public holidays in Hong Kong.<br />

                            All pronouns used in Terms of Use, whether used for masculine, feminine or neuter, shall include
                            all
                            other genders, and the singular shall include the plural and vice versa.<br /><br />

                            Any disputes in connection with this Platform or the Services thereunder, MediQ's decision shall
                            be
                            final, binding and conclusive.<br /><br />

                            If any part of the Terms of Use is held to be unenforceable, the unenforceable part shall be
                            effective to
                            the greatest extent possible, and the remainder shall remain in full force and
                            effect.<br /><br />

                            In the event of any discrepancy between the English version of any of the Terms of Use and any
                            translated version, the English language version shall prevail.<br /><br />

                            This Terms of Use is governed by the laws of Hong Kong. You irrevocably submit to the exclusive
                            jurisdiction of the courts of Hong Kong.<br /><br />

                            If, at any time, we have not requested the performance of any provision of these Terms of Use or
                            the
                            exercise of any right provided for herein, it shall not be deemed as a waiver of requesting
                            performance of such provisions or exercising such rights. All waivers must be made by us in
                            writing.
                            Unless the written waiver contains an express statement to the contrary, no waiver of any breach
                            of
                            any provision of these Terms of Use or of any right provided for herein made by us shall be
                            construed
                            as a waiver of any continuing or succeeding breach of such provision, a waiver of the provision
                            itself,
                            or a waiver of any right under these Terms of Use.<br /><br />
                            Last Modified: September 2023
                        </p>
                    </div>
                    <div>
                        <p><b>More information or questions?</b></p>
                        <p>For additional information and to learn more about MediQ, please also refer to our <a
                                href="/">FAQs</a>
                            on the
                            Website.</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
