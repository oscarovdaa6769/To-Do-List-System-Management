<div style="width: 100%; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px;">

  <div style="padding: 14px 20px;">
    <h4 style="font-size: 14px; font-weight: 500; color: #111827; margin: 0;">Notifications</h4>
  </div>

  <!-- Task reminders -->
  <div style="border-top: 1px solid #f3f4f6; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
    <div>
      <p style="font-size: 14px; color: #111827; margin: 0 0 2px 0;">Task reminders</p>
      <p style="font-size: 12px; color: #9ca3af; margin: 0;">Get notified before a task is due</p>
    </div>
    <label style="position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0;">
      <input type="checkbox" checked style="opacity: 0; width: 0; height: 0; position: absolute;" />
      <span onclick="toggle(this)" style="position: absolute; cursor: pointer; inset: 0; background: #3b4fd8; border-radius: 999px; transition: background 0.2s;">
        <span style="position: absolute; left: 20px; top: 3px; width: 18px; height: 18px; background: #fff; border-radius: 50%; transition: left 0.2s;"></span>
      </span>
    </label>
  </div>

  <!-- Overdue alerts -->
  <div style="border-top: 1px solid #f3f4f6; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
    <div>
      <p style="font-size: 14px; color: #111827; margin: 0 0 2px 0;">Overdue alerts</p>
      <p style="font-size: 12px; color: #9ca3af; margin: 0;">Alert when a task passes its due date</p>
    </div>
    <label style="position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0;">
      <input type="checkbox" checked style="opacity: 0; width: 0; height: 0; position: absolute;" />
      <span onclick="toggle(this)" style="position: absolute; cursor: pointer; inset: 0; background: #3b4fd8; border-radius: 999px; transition: background 0.2s;">
        <span style="position: absolute; left: 20px; top: 3px; width: 18px; height: 18px; background: #fff; border-radius: 50%; transition: left 0.2s;"></span>
      </span>
    </label>
  </div>

  <!-- Email notifications (OFF) -->
  <div style="border-top: 1px solid #f3f4f6; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
    <div>
      <p style="font-size: 14px; color: #111827; margin: 0 0 2px 0;">Email notifications</p>
      <p style="font-size: 12px; color: #9ca3af; margin: 0;">Receive updates by email</p>
    </div>
    <label style="position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0;">
      <input type="checkbox" style="opacity: 0; width: 0; height: 0; position: absolute;" />
      <span onclick="toggle(this)" style="position: absolute; cursor: pointer; inset: 0; background: #d1d5db; border-radius: 999px; transition: background 0.2s;">
        <span style="position: absolute; left: 3px; top: 3px; width: 18px; height: 18px; background: #fff; border-radius: 50%; transition: left 0.2s;"></span>
      </span>
    </label>
  </div>

  <!-- Weekly summary -->
  <div style="border-top: 1px solid #f3f4f6; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
    <div>
      <p style="font-size: 14px; color: #111827; margin: 0 0 2px 0;">Weekly summary</p>
      <p style="font-size: 12px; color: #9ca3af; margin: 0;">Monday digest of your tasks</p>
    </div>
    <label style="position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0;">
      <input type="checkbox" checked style="opacity: 0; width: 0; height: 0; position: absolute;" />
      <span onclick="toggle(this)" style="position: absolute; cursor: pointer; inset: 0; background: #3b4fd8; border-radius: 999px; transition: background 0.2s;">
        <span style="position: absolute; left: 20px; top: 3px; width: 18px; height: 18px; background: #fff; border-radius: 50%; transition: left 0.2s;"></span>
      </span>
    </label>
  </div>

</div>

<script>
  function toggle(el) {
    const isOn = el.style.background === 'rgb(59, 79, 216)';
    el.style.background = isOn ? '#d1d5db' : '#3b4fd8';
    el.children[0].style.left = isOn ? '3px' : '20px';
  }
</script>