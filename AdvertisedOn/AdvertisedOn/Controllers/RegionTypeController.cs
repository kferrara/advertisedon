using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles = "Administrator")]
    public class RegionTypeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /RegionType/
        public ActionResult Index()
        {
            return View(db.RegionTypes.ToList());
        }

        //
        // GET: /RegionType/Details/5
        public ActionResult Details(int id = 0)
        {
            var regiontype = db.RegionTypes.Find(id);

            if (regiontype == null)
            {
                return HttpNotFound();
            }

            return View(regiontype);
        }

        //
        // GET: /RegionType/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /RegionType/Create
        [HttpPost]
        public ActionResult Create(RegionType regiontype)
        {
            if (ModelState.IsValid)
            {
                db.RegionTypes.Add(regiontype);
                db.SaveChanges();

                return RedirectToAction("Index");
            }

            return View(regiontype);
        }

        //
        // GET: /RegionType/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var regiontype = db.RegionTypes.Find(id);

            if (regiontype == null)
            {
                return HttpNotFound();
            }

            return View(regiontype);
        }

        //
        // POST: /RegionType/Edit/5
        [HttpPost]
        public ActionResult Edit(RegionType regiontype)
        {
            if (ModelState.IsValid)
            {
                db.Entry(regiontype).State = EntityState.Modified;
                db.SaveChanges();

                return RedirectToAction("Index");
            }
            return View(regiontype);
        }

        //
        // GET: /RegionType/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var regiontype = db.RegionTypes.Find(id);

            if (regiontype == null)
            {
                return HttpNotFound();
            }

            return View(regiontype);
        }

        //
        // POST: /RegionType/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var regiontype = db.RegionTypes.Find(id);

            db.RegionTypes.Remove(regiontype);
            db.SaveChanges();

            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}