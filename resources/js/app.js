// resources/js/app.js

// لا تستورد jQuery أو ElevateZoom هنا إذا كنت تستخدم CDN في layouts/app.blade.php
// import 'elevatezoom'; // ⬅️ قم بإزالة هذا السطر
// import 'jquery'; // ⬅️ قم بإزالة هذا السطر أو أي شيء متعلق بـ require('jquery')

// ابقِ هذا السطر إذا كان يضمّن Bootstrap JS أو أي تبعيات أخرى
import './bootstrap';

// أي JavaScript مخصص آخر لا يعتمد على jQuery أو ElevateZoom يمكن أن يبقى هنا.
// كود تهيئة ElevateZoom ومعرض الصور المصغرة سننقله إلى products/show.blade.php
// داخل @push('scripts')